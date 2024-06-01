<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'pairNumber',
        'player1',
        'player2',
    ];

    protected function names(): Attribute
    {
        return Attribute::make(
            get: fn () => "$this->player1 - $this->player2"
        );
    }
}
