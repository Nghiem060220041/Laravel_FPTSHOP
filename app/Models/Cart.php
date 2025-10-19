<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    use HasFactory;

    // Thêm 'session_id' vào danh sách được phép
    protected $fillable = ['user_id', 'product_id', 'quantity', 'session_id'];
    
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
