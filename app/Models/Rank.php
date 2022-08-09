<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Rank extends Model
{
    use HasFactory;

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }

    public function scopeList($query)
    {
        $query->join('members', 'members.id', '=', 'ranks.member_id')
              ->select('members.id', 'members.name', 'members.surname',
                  DB::raw('SUM(points) AS point_count'))
              ->groupBy('member_id')
              ->orderBy('point_count', 'desc');
    }

    public function scopeMonth($query, $year, $month)
    {
        $start = Carbon::createFromFormat('Y-m-d', $year.'-'.$month.'-01')->startOfMonth();
        $end = $start->copy()->endOfMonth();

        $query->whereHas('tournament', function ($innerQuery) use ($start, $end) {
            $innerQuery->whereBetween('date', [$start, $end]);
        });
    }

    public function scopeSeason($query)
    {
        $query->join('tournaments', 'tournaments.id', '=', 'ranks.tournament_id')
              ->where('tournaments.season_id', Season::getCurrent()->id);
    }

    /*public static function month($year, $month)
    {
        $start = Carbon::createFromFormat('Y-m-d', $year.'-'.$month.'-01')->startOfMonth();
        $end   = $start->copy()->endOfMonth();

        return Rank::with(['member:id,name,surname'])->whereHas('tournament', function ($query) use ($start, $end) {
            $query->whereBetween('date', [$start, $end]);
        })->orderBy('point_count', 'desc')
                   ->select('tournament_id', 'member_id')
                   ->selectRaw('SUM(points) AS point_count')
                   ->groupBy('member_id')
                   ->orderBy('point_count', 'desc');
    }

    public static function currentSeason()
    {
        return Rank::with(['member:id,name,surname'])->whereHas('tournament', function ($query) {
            $query->where('season_id', Season::getCurrent()->id);
        })->orderBy('point_count', 'desc')
                   ->select('tournament_id', 'member_id')
                   ->selectRaw('SUM(points) AS point_count')
                   ->groupBy('member_id')
                   ->orderBy('point_count', 'desc');
    }*/

    public static function top($count)
    {
        //return self::month(date('Y'), date('m'))->limit($count);
        return self::list()->month(date('Y'), date('m'))->limit($count);
    }
}
