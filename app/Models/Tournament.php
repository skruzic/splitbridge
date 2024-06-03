<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Http;

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

    protected $with = [
        'sessions',
        'units',
    ];

    protected $hidden = [
        'results',
        'season_id',
        'created_at',
        'updated_at',
    ];

    protected static function booted()
    {
        parent::booted();

        static::creating(function ($model) {
            DB::transaction();
            $model->season_id = Season::getCurrent()->id;

            if ($model->remote_id > 0) {
                try {
                    $this->parseHBS();

                    DB::commit();
                }
                catch(Exception $ex) {
                    DB::rollBack();
                    throw $ex;
                }
            }
        });

        static::created(function (Tournament $model) {
            if ($model->results) {
                $json   = json_decode($model->results, true);
                $ranks  = array_map(function ($item) {
                    return $item['rank'];
                }, $json);
                $points = compute_points($ranks);

                // Unos u rang listu
                for ($i = 0; $i < count($json); $i++) {
                    $position = $json[$i]['rank'];
                    $p1       = $json[$i]['p1'];
                    $p2       = $json[$i]['p2'];

                    // Provjera prvog igraca i unos ranga
                    if (is_numeric($p1) && Member::findByMemberID($p1)) {
                        $rank                = new Rank;
                        $rank->member_id     = Member::findByMemberID($p1)->id;
                        $rank->tournament_id = $model->id;
                        $rank->rank          = $position;
                        $rank->points        = $points[$i];
                        $rank->save();
                    }

                    // Provjera drugog igraca i unos ranga
                    if (is_numeric($p2) && Member::findByMemberID($p2)) {
                        $rank                = new Rank;
                        $rank->member_id     = Member::findByMemberID($p2)->id;
                        $rank->tournament_id = $model->id;
                        $rank->rank          = $position;
                        $rank->points        = $points[$i];
                        $rank->save();
                    }
                }
            }


        });

        static::deleting(function (Tournament $model) {
            $model->ranks()->delete();
            $model->units()->delete();
            $model->sessions()->each(fn(Session $s) => $s->boards()->each(fn(Board $b) => $b->travellers()->delete()));
            $model->sessions()->each(fn(Session $s) => $s->boards()->delete());
            $model->sessions()->delete();
            //unlink(public_path($model->results));
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

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function boards(): HasManyThrough
    {
        return $this->hasManyThrough(Board::class, Session::class);
    }


    /* Helper methods */

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

    public function parseHBS(): void
    {
        $response = Http::get("https://bridge.hr/api/pair/$this->remote_id");

        $units        = $response->json('data.units');
        $sessions     = $response->json('data.sessions');
        $roundData    = $response->collect('data.rounddata');
        $receivedData = $response->collect('data.receiveddata');
        $allPlayers   = collect($response->json('data.players'));
        $boards       = $response->json('data.handRecords');

        $numPairs = count($units);

        // Sesije
        $sessionModels = array_map(function ($item) {
            //return new Session(['number' => $item['number']]);
            return ['number' => $item['number']];
        }, $sessions);

        $this->sessions()->createMany($sessionModels);
        //$this->refresh();

        // Bordovi
        foreach ($boards as $board) {
            $currentSessionNumber = array_values(array_filter($sessions,
                fn($session) => $session['id'] === $board['session_id']))[0]['number'];

            $currentSession = $this->sessions()->where('number', $currentSessionNumber)->first();

            $currentSession->boards()->save(new Board([
                'number' => $board['board'],
                'dealer' => $board['dealer'],
                'vul'    => $board['vul'],
                'ns'     => $board['ns'],
                'nh'     => $board['nh'],
                'nd'     => $board['nd'],
                'nc'     => $board['nc'],
                'ss'     => $board['ss'],
                'sh'     => $board['sh'],
                'sd'     => $board['sd'],
                'sc'     => $board['sc'],
                'es'     => $board['es'],
                'eh'     => $board['eh'],
                'ed'     => $board['ed'],
                'ec'     => $board['ec'],
                'ws'     => $board['ws'],
                'wh'     => $board['wh'],
                'wd'     => $board['wd'],
                'wc'     => $board['wc'],
                'ddn'    => $board['dfn'],
                'dds'    => $board['dfs'],
                'dde'    => $board['dfe'],
                'ddw'    => $board['dfw'],
            ]));
        }

        // Parovi
        $this->units()->createMany(array_map(function ($item) use ($allPlayers) {
            $p1 = $allPlayers->firstWhere('hbs_id', $item['p1']);
            $p2 = $allPlayers->firstWhere('hbs_id', $item['p2']);

            return [
                'pairNumber' => $item['number'],
                'player1'    => is_array($p1) ? "{$p1['ime']} {$p1['prezime']}" : $item['p1'],
                'player2'    => is_array($p2) ? "{$p2['ime']} {$p2['prezime']}" : $item['p1'],
            ];
        }, $units));

        $travellers = create_travellers($roundData, $receivedData);

        // Grupiranje po sjednici i bordu (isti bordovi se mogu igrati u više sjednica)
        $travellersBySessionByBoard = $travellers->groupBy([
            'session_id',
            'board',
        ]);

        $travellersBySessionByBoard->each(function ($itemsByBoard, $key) use ($sessions, $numPairs) {
            $currentSessionNumber = array_values(array_filter($sessions,
                fn($session) => $session['id'] === $key))[0]['number'];

            $currentSession = $this->sessions()->where('number', $currentSessionNumber)->first();

            collect($itemsByBoard)->each(function ($item, $boardKey) use ($currentSession, $numPairs) {
                if ($this->type == 'MP') {
                    calculate_matchpoints($item);
                } elseif ($this->type == 'IMP') {
                    calculate_butler($item, butler_exclusions($numPairs));
                } elseif ($this->type == 'XIMP') {
                    calculate_crossimps($item);
                } else {
                    // TODO: Team
                }

                $board = $currentSession->boards()->where('number', $boardKey)->first();
                $board->travellers()->createMany($item);
            });

        });
    }

    /**
     * Vraća zadnjih N turnira
     *
     * @param  $limit  broj zadnjih turnira koje vraća
     *
     * @return mixed
     */
    public static function recent($limit)
    {
        return self::where('season_id', Season::getCurrent()->id)->orderBy('date', 'desc')->limit($limit);
    }
}
