<?php

if ( ! function_exists('array_map_recursive')) {
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
