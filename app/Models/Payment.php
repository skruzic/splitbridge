<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'payment_date',
        'type',
        'member_id',
        'payer_name',
        'description'
    ];

    protected $casts = [
        'amount' => MoneyCast::class
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
