<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Session extends Model
{
    use HasFactory;

    protected $fillable = ['number'];

    public function boards(): HasMany
    {
        return $this->hasMany(Board::class);
    }
}
