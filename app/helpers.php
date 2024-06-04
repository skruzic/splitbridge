<?php

use App\Models\Board;
use App\Models\Session;
use App\Models\Tournament;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

if ( ! function_exists('array_map_recursive')) {
    /**
     * Rekurzivna implementacija array_map funkcije
     */
    function array_map_recursive($callback, $array): array
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = array_map_recursive($callback, $value);
            } else {
                $array[$key] = call_user_func($callback, $value);
            }
        }

        return $array;
    }
}

if ( ! function_exists('compute_ranks')) {
    /**
     * Iz niza rezultata izračunava rangove
     */
    function compute_ranks(array $results): array
    {
        $ranks = [];

        $occ     = array_count_values($results);
        $results = array_unique($results);

        $i = 0;

        foreach ($results as $r) {
            for ($j = 0; $j < $occ[$r]; $j++) {
                $ranks[] = $i + 1;
            }
            $i += $occ[$r];
        }

        return $ranks;
    }
}

if ( ! function_exists('compute_points')) {
    function compute_points(array $results, int $unit_points = 5, string $type = 'pair')
    {
        if ($type == 'pair') {
            $points       = []; // poeni prema pravilima
            $score        = []; // konacni poeni koji se dobiju nakon sto se izracuna dioba mjesta
            $resultPoints = []; // poeni koji se dobiju za svaki rezultat

            $groupedResults = [];
            $count          = count($results);
            $positions_inv  = array_map(fn($n) => 1 / $n, range(1, count($results)));

            /**
             * Izracun poena za svako mjesto prema novim pravilima
             */
            for ($i = 1; $i <= $count; $i++) {
                $points[] = $unit_points * $count / ($i * array_sum($positions_inv));
            }

            // Grupiranje rezultata
            for ($i = 0; $i < $count; $i++) {
                $groupedResults[$results[$i]][] = $points[$i];
            }

            foreach ($groupedResults as $key => $value) {
                $i     = 0;
                $total = 0;
                foreach ($value as $v) {
                    $total += $v;
                    $i++;
                }
                if ($i != 0) {
                    $total /= $i;
                }

                $resultPoints[$key] = $total;
            }

            foreach ($results as $r) {
                $score[] = $resultPoints[$r];
            }

            return $score;

        }
    }
}

if ( ! function_exists('create_travellers')) {
    function create_travellers(
        Collection $roundData,
        Collection $receivedData,
    ): Collection {
        $travellers = $roundData->map(function ($round, $roundKey) use ($receivedData) {
            $boards = $receivedData->filter(fn($receivedItem
            ) => $receivedItem['session_id'] == $round['session_id'] && $receivedItem['table'] == $round['table'] && $receivedItem['round'] == $round['round'] && $round['low_board'] <= $receivedItem['board'] && $receivedItem['board'] <= $round['high_board']);

            if ($boards->count() > 0) {
                return $boards->map(fn($board) => [
                    'session_id' => $round['session_id'],
                    'pairNS'     => $round['nspair'],
                    'pairEW'     => $round['ewpair'],
                    'table'      => $round['table'],
                    'round'      => $round['round'],
                    'board'      => $board['board'],
                    'contract'   => $board['contract'],
                    'lead'       => $board['lead'],
                    'declarer'   => $board['declarer'],
                    'tricks'     => $board['tricks'],
                    'score'      => $board['score'],
                    'ruling'     => $board['ruling'],
                ]);
            } else {
                for ($i = $round['low_board']; $i <= $round['high_board']; $i++) {
                    $boards->push([
                        'session_id' => $round['session_id'],
                        'pairNS'     => $round['nspair'],
                        'pairEW'     => $round['ewpair'],
                        'table'      => $round['table'],
                        'round'      => $round['round'],
                        'board'      => $i,
                    ]);
                }

                return $boards;
            }
        });

        return $travellers->flatten(1);
    }
}

if ( ! function_exists('calculate_matchpoints')) {
    function calculate_matchpoints(Collection &$travellers): void
    {
        $numResults    = $travellers->count();
        $matchpointsNS = array_fill(0, $numResults, 0);
        $matchpointsEW = array_fill(0, $numResults, 0);

        // Calculate matchpoints based on comparisons
        for ($i = 0; $i < $numResults; $i++) {
            if ($travellers[$i]['pairNS'] == 0 || $travellers[$i]['pairEW'] == 0) {
                continue; // preskačemo bye
            }

            for ($j = 0; $j < $numResults; $j++) {
                if ($i == $j || $travellers[$j]['pairNS'] == 0 || $travellers[$j]['pairEW'] == 0) {
                    continue; // preskačemo usporedbu sa samim sobom
                }
                if ($travellers[$i]['score'] > $travellers[$j]['score']) {
                    $matchpointsNS[$i] += 2;
                    $matchpointsEW[$i] += 0;
                } elseif ($travellers[$i]['score'] < $travellers[$j]['score']) {
                    $matchpointsNS[$i] += 0;
                    $matchpointsEW[$i] += 2;
                } else {
                    $matchpointsNS[$i] += 1;
                    $matchpointsEW[$i] += 1;
                }
            }
        }

        // Top je 2*(N-1), N je broj rezultata bez bajeva
        $top = 2 * ($travellers->filter(fn($t) => $t['pairNS'] != 0 && $t['pairEW'] != 0)->count() - 1);

        // Adding matchpoints to the traveller
        $travellers->transform(function ($item, $index) use ($matchpointsNS, $matchpointsEW, $top) {
            if ($item['pairNS'] == 0) {
                $item['pointsEW'] = 0.6 * $top;
            } elseif ($item['pairEW'] == 0) {
                $item['pointsNS'] = 0.6 * $top;
            } else {
                $item['pointsNS'] = $matchpointsNS[$index];
                $item['pointsEW'] = $matchpointsEW[$index];
            }

            return $item;
        });

        neuberg($travellers);
    }
}

if ( ! function_exists('calculate_butler')) {
    function calculate_butler(Collection &$travellers, int $exclude = 0): void
    {
        $scores = $travellers->filter(fn($t
        ) => $t['pairNS'] != 0 && $t['pairEW'] != 0)->pluck('score')->sort()->values();

        $numScores = $scores->count();

        // Izbaci N najboljih i najgorih
        $filteredScores = $scores->slice($exclude, $numScores - 2 * $exclude);

        $averageScore = round($filteredScores->avg() / 10) * 10;

        // Calculate Butler IMPs based on comparisons to the average score
        $travellers->transform(function ($item) use ($averageScore) {
            if ($item['pairNS'] == 0) {
                $item['pointsEW'] = 3;
            } elseif
            ($item['pairEW'] == 0) {
                $item['pointsNS'] = 3;
            } else {
                $difference       = $item['score'] - $averageScore;
                $imps             = convert_to_imps($difference);
                $item['pointsNS'] = $imps;
                $item['pointsEW'] = -$imps;
            }

            return $item;
        });
    }
}

if ( ! function_exists('calculate_crossimps')) {
    function calculate_crossimps(array &$travellers): void
    {

    }
}

if ( ! function_exists('convert_to_imps')) {
    function convert_to_imps(int $difference): int
    {
        $sign       = ($difference > 0) - ($difference < 0);
        $difference = abs($difference);

        $impsTable = [
            0  => 10,
            1  => 40,
            2  => 80,
            3  => 120,
            4  => 160,
            5  => 210,
            6  => 260,
            7  => 310,
            8  => 360,
            9  => 420,
            10 => 490,
            11 => 590,
            12 => 740,
            13 => 890,
            14 => 1090,
            15 => 1290,
            16 => 1490,
            17 => 1740,
            18 => 1990,
            19 => 2240,
            20 => 2490,
            21 => 2990,
            22 => 3490,
            23 => 3990,
            24 => PHP_INT_MAX,
        ];

        foreach ($impsTable as $imps => $upperLimit) {
            if ($difference <= $upperLimit) {
                return $sign * $imps;
            }
        }

        return $sign * 24;
    }
}

if ( ! function_exists('butler_exclusions')) {
    function butler_exclusions(int $num_pairs): int
    {
        $table = [
            0 => 9,
            1 => 15,
            2 => PHP_INT_MAX,
        ];

        foreach ($table as $exclusions => $key) {
            if ($num_pairs <= $key) {
                return $exclusions;
            }
        }

        return 0;
    }
}
if ( ! function_exists('neuberg')) {
    function neuberg(Collection &$travellers): void
    {
        $num_scores       = $travellers->count();
        $num_valid_scores = $num_scores - $travellers->filter(fn($item
            ) => isset($item['ruling']) && $item['ruling'])->count();

        $travellers->transform(function ($item, $index) use ($num_scores, $num_valid_scores) {
            if ( ! isset($item['ruling']) || ! $item['ruling']) {
                // Bez presude
                if ($item['pairNS'] != 0) {
                    $item['pointsNS'] = $num_scores / $num_valid_scores * ($item['pointsNS'] + 1) - 1;
                }

                if ($item['pairEW'] != 0) {
                    $item['pointsEW'] = $num_scores / $num_valid_scores * ($item['pointsEW'] + 1) - 1;
                }
            }

            // Bez presude ne diramo

            return $item;
        });
    }
}
