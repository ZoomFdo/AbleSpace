<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAuth extends Model
{
    /** @use HasFactory<\Database\Factories\UserAuthFactory> */
    use HasFactory;

    protected $table = 'user_auth';
    protected $primaryKey = 'auth_id';

    protected $fillable = ['user_id', 'username', 'password'];
    protected $hidden = ['password'];

    protected $casts = ['password' => 'hashed'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
