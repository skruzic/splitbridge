<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'body',
        'sticky',
        'status',
        'published_date',
    ];

    protected $casts = ['status' => Status::class];
}
