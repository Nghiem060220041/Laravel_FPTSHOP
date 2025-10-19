<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'category_id',
        'quantity',
        'status'
    ];

    public function category()
    {
        // Một sản phẩm thuộc về một danh mục
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        // Một sản phẩm có nhiều đánh giá
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        // Một sản phẩm có nhiều hình ảnh
        return $this->hasMany(ProductImage::class);
    }

    public function warranties()
    {
        // Một sản phẩm có nhiều gói bảo hành
        return $this->hasMany(ProductWarranty::class);
    }

    public function orderItems()
    {
        // Một sản phẩm có thể xuất hiện trong nhiều mục đơn hàng
        return $this->hasMany(OrderItem::class);
    }

    public function orders()
    {
        // Một sản phẩm có thể nằm trong nhiều đơn hàng
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    } 
    
    public function getAverageRatingAttribute()
    {
        if ($this->reviews->isEmpty()) {
            return 0;
        }
        
        return $this->reviews->avg('rating');
    }
}
