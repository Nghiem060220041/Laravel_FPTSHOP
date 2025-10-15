<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        'parent_id'
    ];

    public function products()
    {
        // Một danh mục có nhiều sản phẩm
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        // Một danh mục có thể có một danh mục cha
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function children()
    {
        // Một danh mục có thể có nhiều danh mục con
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function isParent()
    {
        return is_null($this->parent_id);
    }

    public function hasChildren()
    {
        return $this->children()->exists();
    }

    public function allProducts()
    {
        return Product::whereIn('category_id', $this->allCategoryIds());
    }


    public function allCategoryIds()
    {
        $ids = [$this->id];
        
        foreach ($this->children as $child) {
            $ids = array_merge($ids, $child->allCategoryIds());
        }
        
        return $ids;
    }

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }
}
