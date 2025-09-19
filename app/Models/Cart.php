<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCart
 */
class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    const CREATED_AT = 'created_date';

    protected $table = 'cart';
    protected $primaryKey = 'cart_id';

    protected $fillable = ['user_id'];

    public function products()
    {
        return $this->hasMany(CartProduct::class, 'cart_id');
    }
}
