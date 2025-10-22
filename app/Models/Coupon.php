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
        'times_used'
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];
    
    public function isValid()
    {
        // Kiểm tra nếu đã quá hạn sử dụng
        if ($this->expires_at && $this->expires_at->isPast()) {
            return false;
        }
        
        // Kiểm tra nếu chưa đến ngày bắt đầu
        if ($this->starts_at && $this->starts_at->isFuture()) {
            return false;
        }
        
        // Kiểm tra nếu đã vượt quá số lần sử dụng cho phép
        if ($this->usage_limit !== null && $this->times_used >= $this->usage_limit) {
            return false;
        }
        
        return true;
    }
}