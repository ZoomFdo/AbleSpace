<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCoupon
 */
class Coupon extends Model
{
    /** @use HasFactory<\Database\Factories\CouponFactory> */
    use HasFactory;

    protected $table = 'coupons';
    protected $primaryKey = 'coupon_id';

    protected $fillable = [
        'coupon_code', 'discount_percent', 'min_order_amount',
        'valid_from_date', 'valid_until_date', 'usage_limit',
        'used_count', 'is_active', 'description'
    ];

    // public function products()
    // {
    //     return $this->hasMany(CouponProduct::class, 'coupon_id');
    // }
}
