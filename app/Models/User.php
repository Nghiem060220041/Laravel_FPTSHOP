<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool // kiểm tra người dùng có phải admin không
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reviewedProducts()
    {
        return $this->belongsToMany(Product::class, 'reviews')
            ->withPivot('rating', 'comment')
            ->withTimestamps();
    }

    public function latestOrder()
    {
        return $this->hasOne(Order::class)->latestOfMany();
    }

    public function hasOrdered(Product $product)
    {
        return $this->orders()
            ->whereHas('products', function ($query) use ($product) {
                $query->where('products.id', $product->id);
            })
            ->exists();
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function scopeHasOrders($query)
    {
        return $query->whereHas('orders');
    }
}
