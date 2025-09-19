<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCartProduct
 */
class CartProduct extends Model
{
    /** @use HasFactory<\Database\Factories\CartProductFactory> */
    use HasFactory;

    protected $table = 'cart_product';
    protected $primaryKey = 'cart_product_id';

     protected $fillable = ['cart_id', 'product_id', 'quantity'];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
