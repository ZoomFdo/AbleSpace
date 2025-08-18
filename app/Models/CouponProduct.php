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
}
