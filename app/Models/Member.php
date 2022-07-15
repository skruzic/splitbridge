<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'name',
        'email',
        'crobridge',
    ];

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
