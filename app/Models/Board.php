<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
