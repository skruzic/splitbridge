<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traveller extends Model
{
    use HasFactory;

    protected $fillable = [
        'pairNS', 'pairEW', 'round', 'contract', 'declarer', 'lead', 'score', 'ruling', 'pointsNS', 'pointsEW'
    ];

    protected $casts = [
        'ruling' => 'boolean'
    ];
}
