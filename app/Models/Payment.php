<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'method',
        'transaction_id',
        'amount',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isSuccessful()
    {
        return $this->status === 'success';
    }

    public function hasFailed()
    {
        return $this->status === 'failed';
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeSuccessful($query)
    {
        return $query->where('status', 'success');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }
}
