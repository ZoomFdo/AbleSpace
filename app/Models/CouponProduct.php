<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponProduct extends Model
{
    /** @use HasFactory<\Database\Factories\CouponProductFactory> */
    use HasFactory;

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'updated_date';

    protected $table = 'coupon_product';
    protected $primaryKey = 'coupon_product_id';

     protected $fillable = ['coupon_id', 'product_id'];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
