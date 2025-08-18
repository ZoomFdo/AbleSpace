<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    const CREATED_AT = 'created_date';

    protected $table = 'reviews';
    protected $primaryKey = 'review_id';
}
