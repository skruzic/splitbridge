<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->name.' '.$this->surname
        );
    }

    public function ranks(): HasMany
    {
        return $this->hasMany(Rank::class)->orderBy('created_at', 'desc');
    }

    /**
     * Checks whether name is Member
     *
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

    public static function findByMemberID(int $crobridge)
    {
        return Member::where('crobridge', $crobridge)->first();
    }
}
