<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use KubAT\PhpSimple\HtmlDomParser;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'type', 'results'];

    protected $casts = [
        'data' => 'array',
        'date' => 'datetime',
    ];

    protected static function booted()
    {
        parent::booted();

        static::creating(function ($model) {
            $model->user_id   = auth()->id();
            $model->season_id = Season::getCurrent()->id;
        });

        static::created(function ($model) {
            $html = HtmlDomParser::file_get_html(storage_path('app/public/'.$model->results));
            $tr   = $html->find('table', 0)->find('tr');

            if ($model->type == 'Tim') {
                $players = self::getTeamNames($tr);
                $results = self::getTeamResults($tr);
                $ranks   = self::computeRanks(self::getTeamResults($tr));
                $points  = self::computeTeamPoints($tr);
            } elseif ($model->type == 'IMP') {
                $players = self::getNames($tr);
                $results = self::getIMPResults($tr);
                $points  = self::computePoints(self::getIMPResults($tr));
                $ranks   = self::computeRanks(self::getIMPResults($tr));
            } elseif ($model->type == 'XIMP') {
                $players = self::getNames($tr);
                $results = self::getXIMPResults($tr);
                $points  = self::computePoints(self::getXIMPResults($tr));
                $ranks   = self::computeRanks(self::getXIMPResults($tr));
            } else {
                $players = self::getNames($tr);
                $results = self::getResults($tr);
                $points  = self::computePoints(self::getResults($tr));
                $ranks   = self::computeRanks(self::getResults($tr));
            }

            // JSON
            $model->data = self::resultsToJson($html, $model->type);
            $model->save();

            // Unos u rang listu
            for ($i = 0; $i < count($players); $i++) {
                foreach ($players[$i] as $player) {
                    if (Member::isMember($player)) {
                        $rank                = new Rank;
                        $rank->member_id     = Member::isMember($player);
                        $rank->tournament_id = $model->id;
                        $rank->rank          = $ranks[$i];
                        $rank->points        = $points[$i];
                        $rank->save();
                    }
                }
            }
        });

        static::deleting(function ($model) {
            $model->ranks()->delete();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function ranks(): HasMany
    {
        return $this->hasMany(Rank::class, 'tournament_id');
    }

    /* Helper methods */

    private static function getNames($table): array
    {
        $players = [];

        for ($i = 0; $i < count($table) - 1; $i++) {
            $players[] = preg_split('/(&amp;|&)/', $table[$i + 1]->find('td', 2)->plaintext);
        }

        return self::array_map_recursive('trim', $players);
    }

    private static function getTeamNames($table): array
    {
        $players = [];

        for ($i = 2, $j = 0; $i < count($table); $i += 2, $j++) {
            $players[$j] = preg_split('/(&|&amp;)/', $table[$i]->find('td', 2)->plaintext);
            $players[$j] = array_merge($players[$j],
                preg_split('/(&|&amp;)/', $table[$i + 1]->find('td', 0)->plaintext));
        }

        return self::array_map_recursive('trim', $players);
    }

    private static function getResults($table): array
    {
        $results = [];

        for ($i = 0; $i < count($table) - 1; $i++) {
            $results[] = trim($table[$i + 1]->find('td', 6)->plaintext);
        }

        return $results;
    }

    private static function getIMPResults($table): array
    {
        $results = [];

        for ($i = 0; $i < count($table) - 1; $i++) {
            $results[] = trim($table[$i + 1]->find('td', 5)->plaintext);
        }

        return $results;
    }

    private static function getXIMPResults($table): array
    {
        $results = [];

        for ($i = 0; $i < count($table) - 1; $i++) {
            $results[] = trim($table[$i + 1]->find('td', 4)->plaintext);
        }

        return $results;
    }

    private static function getTeamResults($table): array
    {
        $results = [];

        for ($i = 2; $i < count($table) - 1; $i += 2) {
            $results[] = trim($table[$i]->find('td', 3)->plaintext);
        }

        return $results;
    }

    private static function computeRanks(array $results): array
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

    private static function computePoints(array $results): array
    {
        $points       = []; // poeni prema pravilima
        $score        = []; // konacni poeni koji se dobiju nakon sto se izracuna dioba mjesta
        $resultPoints = []; // poeni koji se dobiju za svaki rezultat

        $groupedResults = [];
        $count          = count($results);

        /**
         * Izracun prema pravilima:
         * - za trece mjesto 2 boda vise nego za cetvrto
         * - za drugo mjesto 3 boda vise nego za trece
         * - za prvo mjesto 4 boda vise nego za drugo
         */
        for ($i = $count; $i > 0; $i--) {
            $points[] = $i;
        }

        $points[2] = $points[3] + 2;
        $points[1] = $points[2] + 3;
        $points[0] = $points[1] + 4;

        // grupiranje rezultata
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

    private static function computeTeamPoints($table): array
    {
        $points = [];
        $par    = (count($table) - 2) / 2;

        switch ($par) {
            case 2:
                $points[0] = 8;
                $points[1] = 5;
                break;
            case 3:
                $points[0] = 12;
                $points[1] = 8;
                $points[2] = 5;
                break;
            case 4:
                $points[0] = 14;
                $points[1] = 10;
                $points[2] = 7;
                $points[3] = 1.5;
                break;
            case 5:
                $points[0] = 16;
                $points[1] = 12;
                $points[2] = 9;
                $points[3] = 3.5;
                $points[4] = 1.5;
                break;
            case 6:
                $points[0] = 18;
                $points[1] = 14;
                $points[2] = 11;
                $points[3] = 5.5;
                $points[4] = 3.5;
                $points[5] = 1.5;
                break;
        }

        return $points;
    }

    /**
     * Rekurizvna implementacija proizvovljne funkcije koja funkcionira kao @param $callback
     *
     * @param $array
     *
     * @return array
     *
     * @see array_map
     */
    private static function array_map_recursive($callback, $array): array
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = self::array_map_recursive($callback, $value);
            } else {
                $array[$key] = call_user_func($callback, $value);
            }
        }

        return $array;
    }

    /**
     * Vraća zadnjih N turnira
     *
     * @param $limit broj zadnjih turnira koje vraća
     *
     * @return mixed
     */
    public static function recent($limit)
    {
        return self::where('season_id', Season::getCurrent()->id)->orderBy('date', 'desc')->limit($limit);
    }

    private static function resultsToJson($html, $type): array
    {
        $results    = self::getRanks($html, $type);
        $scorecards = self::getScorecards($html, $type, count($results));

        return [
            'results'    => $results,
            'travellers' => self::getTravellers($html),
            'scorecards' => $scorecards,
        ];
    }

    private static function getTravellers($html): array
    {
        $tables = $html->find('table table tbody');

        $travellers = [];

        for ($j = 0; $j < count($tables); $j++) {
            for ($i = 0; $i < count($tables[$j]->find('tr')); $i++) {
                $travellers[$j][$i]['NS']       = $tables[$j]->find('tr', $i)->find('td', 0)->plaintext;
                $travellers[$j][$i]['EW']       = $tables[$j]->find('tr', $i)->find('td', 1)->plaintext;
                $travellers[$j][$i]['contract'] = $tables[$j]->find('tr', $i)->find('td', 2)->plaintext;
                $travellers[$j][$i]['declarer'] = $tables[$j]->find('tr', $i)->find('td', 3)->plaintext;
                $travellers[$j][$i]['lead']     = str_replace("&nbsp;", "", $tables[$j]->find('tr', $i)->find('td', 4)->plaintext);
                $travellers[$j][$i]['resultNS'] = str_replace("&nbsp;", "", $tables[$j]->find('tr', $i)->find('td', 5)->plaintext);
                $travellers[$j][$i]['resultEW'] = str_replace("&nbsp;", "", $tables[$j]->find('tr', $i)->find('td', 6)->plaintext);
                $travellers[$j][$i]['pointsNS'] = $tables[$j]->find('tr', $i)->find('td', 7)->plaintext;
                $travellers[$j][$i]['pointsEW'] = $tables[$j]->find('tr', $i)->find('td', 8)->plaintext;
            }
        }

        return $travellers;
    }

    private static function getRanks($html, $type): array
    {
        $ranks = [];

        $table = $html->find('table', 0)->find('tr');

        for ($i = 1; $i < count($table); $i++) {
            $ranks[$i]['rank']    = intval($table[$i]->find('td', 0)->plaintext);
            $ranks[$i]['pair']    = intval($table[$i]->find('td', 1)->plaintext);
            $ranks[$i]['players'] = preg_split('/(&amp;|&)/', $table[$i]->find('td', 2)->plaintext);
            $ranks[$i]['boards']  = intval($table[$i]->find('td', 3)->plaintext);
            if ($type == 'MP') {
                $ranks[$i]['total'] = floatval($table[$i]->find('td', 4)->plaintext);
                $ranks[$i]['max']   = intval($table[$i]->find('td', 5)->plaintext);
                $ranks[$i]['score'] = floatval($table[$i]->find('td', 6)->plaintext);
            } elseif ($type == 'XIMP') {
                $ranks[$i]['score'] = floatval($table[$i]->find('td', 4)->plaintext);
            } elseif ($type == 'IMP') {
                $ranks[$i]['score'] = floatval($table[$i]->find('td', 5)->plaintext);
            }
        }

        return $ranks;
    }

    private static function getScorecards($html, $type, $cnt): array
    {
        $scorecards = [];

        $tables = array_slice($html->find('table'), -$cnt, $cnt);

        for ($j = 0; $j < count($tables); $j++) {
            $rows = $tables[$j]->find('tr');

            $scorecards[$j]['pair']       = intval(explode(' ', trim(substr($rows[0]->plaintext, 0, 7)))[1]);
            $scorecards[$j]['players']    = preg_split('/(&amp;|&)/', substr($rows[0]->plaintext, 6));
            $scorecards[$j]['players'][0] = mb_convert_case($scorecards[$j]['players'][0], MB_CASE_TITLE);
            $scorecards[$j]['players'][1] = mb_convert_case($scorecards[$j]['players'][1], MB_CASE_TITLE);

            for ($i = 4; $i < count($rows); $i++) {
                if ($type == 'MP') {
                    $scorecards[$j]['boards'][] = [
                        'board'    => $rows[$i]->find('td', 0)->plaintext,
                        'vul'      => $rows[$i]->find('td', 1)->plaintext,
                        'dir'      => str_replace("&nbsp;", "", $rows[$i]->find('td', 2)->plaintext),
                        'contract' => str_replace("&nbsp;", "", $rows[$i]->find('td', 3)->plaintext),
                        'declarer' => str_replace("&nbsp;", "", $rows[$i]->find('td', 4)->plaintext),
                        'lead'     => str_replace("&nbsp;", "", $rows[$i]->find('td', 5)->plaintext),
                        'score'    => str_replace("&nbsp;", "", $rows[$i]->find('td', 6)->plaintext),
                        'percent'  => str_replace("&nbsp;", "", $rows[$i]->find('td', 7)->plaintext),
                        'MP'       => $rows[$i]->find('td', 8)->plaintext,
                    ];
                } elseif ($type == 'IMP') {
                    $scorecards[$j]['boards'][] = [
                        'board'    => $rows[$i]->find('td', 0)->plaintext,
                        'vul'      => $rows[$i]->find('td', 1)->plaintext,
                        'dir'      => str_replace("&nbsp;", "", $rows[$i]->find('td', 2)->plaintext),
                        'contract' => str_replace("&nbsp;", "", $rows[$i]->find('td', 3)->plaintext),
                        'declarer' => str_replace("&nbsp;", "", $rows[$i]->find('td', 4)->plaintext),
                        'lead'     => str_replace("&nbsp;", "", $rows[$i]->find('td', 5)->plaintext),
                        'score'    => str_replace("&nbsp;", "", $rows[$i]->find('td', 6)->plaintext),
                        'datum'    => $rows[$i]->find('td', 7)->plaintext,
                        'IMP'      => $rows[$i]->find('td', 8)->plaintext,
                    ];
                } elseif ($type == 'XIMP') {
                    $scorecards[$j]['boards'][] = [
                        'board'    => $rows[$i]->find('td', 0)->plaintext,
                        'vul'      => $rows[$i]->find('td', 1)->plaintext,
                        'dir'      => str_replace("&nbsp;", "", $rows[$i]->find('td', 2)->plaintext),
                        'contract' => str_replace("&nbsp;", "", $rows[$i]->find('td', 3)->plaintext),
                        'declarer' => str_replace("&nbsp;", "", $rows[$i]->find('td', 4)->plaintext),
                        'lead'     => str_replace("&nbsp;", "", $rows[$i]->find('td', 5)->plaintext),
                        'score'    => str_replace("&nbsp;", "", $rows[$i]->find('td', 6)->plaintext),
                        'IMP'      => $rows[$i]->find('td', 7)->plaintext,
                    ];
                }
            }
        }

        return $scorecards;
    }
}
