<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    const CREATED_AT = 'created_date';

    protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'category_id', 'manufacturer_id', 'name', 'description',
        'price', 'stock', 'attributes'
    ];

     protected $casts = [
        'attributes' => 'array',
    ];

     public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'product_id');
    }
}
