<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'status', 'user_id'];

    protected $casts = [
        'status' => Status::class
    ];

    protected static function booted()
    {
        parent::booted();

        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    /*public function getSlugOptions(): SlugOptions
    {
        // TODO: Implement getSlugOptions() method.
        return SlugOptions::create()->generateSlugsFrom('title')->saveSlugsTo('slug');
    }*/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
