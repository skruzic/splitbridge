<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'dealer',
        'vul',
        'ns',
        'nh',
        'nd',
        'nc',
        'ss',
        'sh',
        'sd',
        'sc',
        'es',
        'eh',
        'ed',
        'ec',
        'ws',
        'wh',
        'wd',
        'wc',
        'ddn',
        'dds',
        'dde',
        'ddw',
    ];

    protected $with = ['travellers'];

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    public function travellers(): HasMany
    {
        return $this->hasMany(Traveller::class);
    }
}
