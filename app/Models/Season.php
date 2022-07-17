<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    protected function current(): Attribute
    {
        return Attribute::make(get: fn ($value) => $value, set: function ($value) {
            if ($value) {
                $this->where('current', true)->update(['current' => false]);
            }

            return $value;
        });
    }

    public static function getCurrent()
    {
        return self::where('current', true)->first();
    }
}
