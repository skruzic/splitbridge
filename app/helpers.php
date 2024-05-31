<?php

use Illuminate\Support\Collection;

if (!function_exists('array_map_recursive')) {
    /**
     * Rekurzivna implementacija array_map funkcije
     *
     * @param $callback
     * @param $array
     *
     * @return array
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

if (!function_exists('compute_ranks')) {
    /**
     * Iz niza rezultata izračunava rangove
     *
     * @param array $results
     *
     * @return array
     */
    function compute_ranks(array $results): array
    {
        $ranks = [];

        $occ = array_count_values($results);
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

if (!function_exists('compute_points')) {
    function compute_points(array $results, int $unit_points = 5, string $type = 'pair')
    {
        if ($type == 'pair') {
            $points = []; // poeni prema pravilima
            $score = []; // konacni poeni koji se dobiju nakon sto se izracuna dioba mjesta
            $resultPoints = []; // poeni koji se dobiju za svaki rezultat

            $groupedResults = [];
            $count = count($results);
            $positions_inv = array_map(fn($n) => 1 / $n, range(1, count($results)));

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
                $i = 0;
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

if (!function_exists('create_travellers')) {
    function create_travellers(
        array $roundData,
        array $receivedData,
    ): array
    {
        $travellers = [];
        foreach ($roundData as $r) {
            $boards = array_values(array_filter($receivedData, function ($item) use ($r) {
                return $item['session_id'] == $r['session_id'] && $item['table'] == $r['table'] && $item['round'] == $r['round'] && $r['low_board'] <= $item['board'] && $item['board'] <= $r['high_board'];
            }));

            foreach ($boards as $board) {
                $travellers[] = [
                    'session_id' => $r['session_id'],
                    'pairNS' => $r['nspair'],
                    'pairEW' => $r['ewpair'],
                    'table' => $r['table'],
                    'round' => $r['round'],
                    'board' => $board['board'],
                    'contract' => $board['contract'],
                    'lead' => $board['lead'],
                    'declarer' => $board['declarer'],
                    'score' => $board['score'],
                    'ruling' => $board['ruling'],
                ];
            }
        }

        return $travellers;
    }
}

if (!function_exists('calculate_matchpoints')) {
    function calculate_matchpoints(Collection &$travellers): void
    {
        $numResults = $travellers->count();
        $matchpointsNS = array_fill(0, $numResults, 0);
        $matchpointsEW = array_fill(0, $numResults, 0);

        // Calculate matchpoints based on comparisons
        for ($i = 0; $i < $numResults; $i++) {
            for ($j = 0; $j < $numResults; $j++) {
                if ($i == $j) continue;

                if ($travellers[$i]['score'] > $travellers[$j]['score']) {
                    $matchpointsNS[$i] += 2; // Two points for a win for NS
                    $matchpointsEW[$i] += 0; // Zero points for a loss for EW
                } elseif ($travellers[$i]['score'] < $travellers[$j]['score']) {
                    $matchpointsNS[$i] += 0; // Zero points for a loss for NS
                    $matchpointsEW[$i] += 2; // Two points for a win for EW
                } else {
                    $matchpointsNS[$i] += 1; // One point for a tie for NS
                    $matchpointsEW[$i] += 1; // One point for a tie for EW
                }
            }
        }

        // Adding matchpoints to the traveller
        $travellers->transform(function ($item, $index) use ($matchpointsNS, $matchpointsEW) {
            $item['pointsNS'] = $matchpointsNS[$index];
            $item['pointsEW'] = $matchpointsEW[$index];

            return $item;
        });
    }
}

if (!function_exists('calculate_butler')) {
    function calculate_butler(Collection &$travellers): void
    {
        $numResults = $travellers->count();
        $totalScore = $travellers->sum('score');
        $averageScore = round($totalScore / $numResults / 10) * 10;

        // Calculate Butler IMPs based on comparisons to the average score
        $travellers->transform(function ($item) use ($averageScore) {
            $difference = $item['score'] - $averageScore;
            $imps = convert_to_imps($difference);
            $item['pointsNS'] = $imps;
            $item['pointsEW'] = -$imps;
            return $item;
        });
    }
}

if (!function_exists('calculate_crossimps')) {
    function calculate_crossimps(array &$travellers): void
    {

    }
}

if (!function_exists('convert_to_imps')) {
    function convert_to_imps(int $difference): int
    {
        $sign = ($difference > 0) - ($difference < 0);
        $difference = abs($difference);

        $impsTable = [
            0 => 10, 1 => 40, 2 => 80, 3 => 120, 4 => 160, 5 => 210, 6 => 260, 7 => 310, 8 => 360, 9 => 420, 10 => 490,
            11 => 590, 12 => 740, 13 => 890, 14 => 1090, 15 => 1290, 16 => 1490, 17 => 1740, 18 => 1990, 19 => 2240,
            20 => 2490, 21 => 2990, 22 => 3490, 23 => 3990, 24 => PHP_INT_MAX
        ];

        foreach ($impsTable as $imps => $upperLimit) {
            if ($difference <= $upperLimit) {
                return $sign * $imps;
            }
        }

        return $sign * 24;
    }
}

