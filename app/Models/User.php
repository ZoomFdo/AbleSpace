<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name', 'surname', 'registration_date', 'last_seen', 'is_active',
        'method', 'identifier', 'email', 'phone', 'is_email_verified',
        'created_date', 'updated_date', 'last_password_change',
        'failed_attempts', 'locked_until', 'mfa_secret',
    ];

    protected $casts = [
        'is_active'            => 'boolean',
        'is_email_verified'    => 'boolean',
        'registration_date'    => 'datetime',
        'last_seen'            => 'datetime',
        'created_date'         => 'datetime',
        'updated_date'         => 'datetime',
        'last_password_change' => 'datetime',
        'locked_until'         => 'datetime',
        'failed_attempts'      => 'integer'
    ];

    
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_user_role', 'user_id', 'role_id'); //so so 
    }

    public function auth()
    {
        return $this->hasMany(UserAuth::class, 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }  

    public function accessibilitySettings()
    {
        return $this->hasOne(AccessibilitySettings::class, 'user_id');
    }
}
