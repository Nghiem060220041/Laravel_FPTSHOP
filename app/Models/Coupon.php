<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'value',
        'starts_at',
        'expires_at',
        'usage_limit',
        'times_used',
    ];

    // định dạng ngày hết hạn
    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];
}