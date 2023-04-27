<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'path',
    ];

    protected static function booted()
    {
        parent::booted();

        static::deleting(function ($model) {
            unlink(public_path($model->path));
        });
    }

    public function getUrl(): string
    {
        return asset($this->path);
    }
}
