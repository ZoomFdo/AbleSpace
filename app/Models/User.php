<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id'; 
    public const CREATED_AT = 'created_date';
    public const UPDATED_AT = 'updated_date';

    protected $fillable = [
        'name', 'surname', 'email', 'phone', 'is_active', 'is_email_verified',
        'created_date', 'updated_date', 'password', 'registration_date',
        'last_seen', 'method', 'identifier', 'last_password_change',
        'failed_attempts', 'locked_until', 'mfa_secret', 'is_blocked',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_email_verified' => 'boolean',
        'is_blocked' => 'boolean',
        'created_date' => 'datetime',
        'updated_date' => 'datetime',
        'registration_date' => 'datetime',
        'last_seen' => 'datetime',
        'last_password_change' => 'datetime',
        'locked_until' => 'datetime',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $with = [];

    protected $visible = [
        'user_id', 'name', 'surname', 'email', 'phone',
        'is_active', 'is_email_verified', 'created_date', 'updated_date'
    ];

    protected $hidden = [
        'password', 'remember_token', 'mfa_secret'
    ];
}