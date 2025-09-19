<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCategoryProduct
 */
class CategoryProduct extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryProductFactory> */
    use HasFactory;

    protected $table = 'product_category';
}
