<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    /** @use HasFactory<\Database\Factories\RoleUserFactory> */
    use HasFactory;

    protected $table = 'user_user_role';
}
