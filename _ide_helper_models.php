<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @mixin IdeHelperAccessibilitySettings
 * @property int $user_id
 * @property string $theme
 * @property string $text_size
 * @property int $voice_enabled
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\AccessibilitySettingsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessibilitySettings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessibilitySettings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessibilitySettings query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessibilitySettings whereTextSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessibilitySettings whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessibilitySettings whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessibilitySettings whereVoiceEnabled($value)
 */
	class AccessibilitySettings extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperCart
 * @property int $cart_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon $created_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartProduct> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\CartFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCreatedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUserId($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperCartProduct
 * @property int $cart_product_id
 * @property int $cart_id
 * @property int $product_id
 * @property int $quantity
 * @property-read \App\Models\Cart $cart
 * @property-read \App\Models\Product $product
 * @method static \Database\Factories\CartProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartProduct whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartProduct whereCartProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartProduct whereQuantity($value)
 */
	class CartProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperCategory
 * @property int $category_id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperCategoryProduct
 * @property int $product_id
 * @property int $category_id
 * @method static \Database\Factories\CategoryProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct whereProductId($value)
 */
	class CategoryProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperCoupon
 * @property int $coupon_id
 * @property string $coupon_code
 * @property int $discount_percent
 * @property string $min_order_amount
 * @property string|null $valid_from_date
 * @property string|null $valid_until_date
 * @property int $usage_limit
 * @property int $used_count
 * @property int $is_active
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CouponProduct> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\CouponFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereCouponCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereDiscountPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereMinOrderAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereUsageLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereUsedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereValidFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereValidUntilDate($value)
 */
	class Coupon extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperCouponProduct
 * @property int $coupon_product_id
 * @property int $coupon_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon $created_date
 * @property \Illuminate\Support\Carbon|null $updated_date
 * @property-read \App\Models\Coupon $coupon
 * @property-read \App\Models\Product $product
 * @method static \Database\Factories\CouponProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CouponProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CouponProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CouponProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CouponProduct whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CouponProduct whereCouponProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CouponProduct whereCreatedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CouponProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CouponProduct whereUpdatedDate($value)
 */
	class CouponProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperLanguage
 * @property string $language_code
 * @property string $language_name
 * @property string $locale
 * @property int $is_default
 * @method static \Database\Factories\LanguageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Language whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Language whereLanguageCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Language whereLanguageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Language whereLocale($value)
 */
	class Language extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperOrder
 * @property int $order_id
 * @property int $user_id
 * @property string $total_price
 * @property string $status
 * @property string|null $address
 * @property string $order_date
 * @property string|null $delivery_date
 * @property int|null $coupon_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderProduct> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\OrderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperOrderProduct
 * @property int $order_product_id
 * @property int $order_id
 * @property int $product_id
 * @property string $price
 * @property int $quantity
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Product $product
 * @method static \Database\Factories\OrderProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereOrderProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereQuantity($value)
 */
	class OrderProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PendingUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PendingUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PendingUser query()
 */
	class PendingUser extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $product_id
 * @property int $category_id
 * @property int $manufacturer_id
 * @property string $name
 * @property string|null $description
 * @property string $price
 * @property \Illuminate\Support\Carbon $created_date
 * @property int $stock
 * @property array<array-key, mixed>|null $attributes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderProduct> $orderProducts
 * @property-read int|null $order_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereManufacturerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereStock($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $review_id
 * @property int $user_id
 * @property int $product_id
 * @property int $rating
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon $created_date
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ReviewFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereCreatedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $role_id
 * @property string $role_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereRoleName($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $user_id
 * @property int $role_id
 * @method static \Database\Factories\RoleUserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereUserId($value)
 */
	class RoleUser extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $user_id
 * @property string $name
 * @property string $surname
 * @property \Illuminate\Support\Carbon $registration_date
 * @property \Illuminate\Support\Carbon|null $last_seen
 * @property bool $is_active
 * @property string|null $method
 * @property string|null $identifier
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $phone
 * @property bool $is_email_verified
 * @property \Illuminate\Support\Carbon|null $created_date
 * @property \Illuminate\Support\Carbon|null $updated_date
 * @property \Illuminate\Support\Carbon|null $last_password_change
 * @property int $failed_attempts
 * @property \Illuminate\Support\Carbon|null $locked_until
 * @property string|null $mfa_secret
 * @property bool $is_blocked
 * @property-read \App\Models\AccessibilitySettings|null $accessibilitySettings
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserAuth> $auth
 * @property-read int|null $auth_count
 * @property-read \App\Models\Cart|null $cart
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereFailedAttempts($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsBlocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsEmailVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastPasswordChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastSeen($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLockedUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereMfaSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRegistrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUserId($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * @property int $auth_id
 * @property int $user_id
 * @property string $username
 * @property string|null $password
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\UserAuthFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuth query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuth whereAuthId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuth wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuth whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuth whereUsername($value)
 */
	class UserAuth extends \Eloquent {}
}

