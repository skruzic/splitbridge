<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Traveller extends Model
{
    use HasFactory;

    protected $fillable = [
        'pairNS',
        'pairEW',
        'round',
        'contract',
        'declarer',
        'lead',
        'tricks',
        'score',
        'ruling',
        'pointsNS',
        'pointsEW',
    ];

    protected $casts = [
        'ruling'   => 'boolean',
        'pointsNS' => MoneyCast::class,
        'pointsEW' => MoneyCast::class,
    ];

    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }

    public function scopeByUnit(Builder $query, int $pairNumber): void
    {
        $query->where('pairNS', $pairNumber)
              ->orWhere('pairEW', $pairNumber)
              ->with('board');
    }
}
