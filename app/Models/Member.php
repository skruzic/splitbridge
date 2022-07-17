<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'surname',
        'name',
        'email',
        'crobridge',
    ];

    public function ranks(): HasMany
    {
        return $this->hasMany(Rank::class);
    }

    /**
     * Checks whether name is Member
     *
     * @param $str
     *
     * @return bool
     */
    public static function isMember($str)
    {
        foreach (Member::all() as $member) {
            $tmp = $member->name.' '.$member->surname;

            if ($tmp == trim($str)) {
                return $member->id;
            }
        }

        return false;
    }
}
