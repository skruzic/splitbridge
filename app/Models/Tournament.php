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

    protected $fillable = [
        'date',
        'type',
        'results',
        'remote_id',
    ];

    protected $casts = [
        'data' => 'array',
        'date' => 'datetime',
    ];

    protected static function booted()
    {
        parent::booted();

        static::creating(function ($model) {
            $model->season_id = Season::getCurrent()->id;
        });

        static::created(function ($model) {
            if ($model->results) {
                $html = HtmlDomParser::file_get_html(public_path($model->results));
                $tr   = $html->find('table', 0)->find('tr');


                $players = self::getNames($tr, $model->type);
                $results = self::getResults($tr);
                $ranks   = compute_ranks($results);
                $points  = compute_points($results);

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
            }
        });

        static::deleting(function ($model) {
            $model->ranks()->delete();
            unlink(public_path('upload/'.$model->results));
        });
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function ranks(): HasMany
    {
        return $this->hasMany(Rank::class, 'tournament_id');
    }

    private static function getNames(array $table, string $type = 'MP'): array
    {
        $players = [];

        if ($type == 'Tim') {
            for ($i = 2, $j = 0; $i < count($table); $i += 2, $j++) {
                $players[$j] = preg_split('/(&|&amp;)/', $table[$i]->find('td', 2)->plaintext);
                $players[$j] = array_merge($players[$j],
                    preg_split('/(&|&amp;)/', $table[$i + 1]->find('td', 0)->plaintext));
            }
        } else {
            for ($i = 0; $i < count($table) - 1; $i++) {
                $players[] = preg_split('/(&amp;|&)/', $table[$i + 1]->find('td', 2)->plaintext);
            }
        }

        return array_map_recursive('trim', $players);
    }

    private static function getResults(array $table, string $type = 'MP'): array
    {
        $results = [];

        $column = [
            'Tim'  => 3,
            'MP'   => 6,
            'IMP'  => 5,
            'XIMP' => 4,
        ];

        if ($type == 'Tim') {
            for ($i = 2; $i < count($table) - 1; $i += 2) {
                $results[] = trim($table[$i]->find('td', $column[$type])->plaintext);
            }
        } else {
            for ($i = 0; $i < count($table) - 1; $i++) {
                $results[] = trim($table[$i + 1]->find('td', $column[$type])->plaintext);
            }
        }

        return $results;
    }

    /* Helper methods */

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
}
