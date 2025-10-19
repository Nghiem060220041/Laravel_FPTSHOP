<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWarranty extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'name',
        'price',
        'description'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ',', '.') . ' đ';
    }
    
    public function scopeOrderByPrice($query, $direction = 'asc')
    {
        return $query->orderBy('price', $direction);
    }
}
