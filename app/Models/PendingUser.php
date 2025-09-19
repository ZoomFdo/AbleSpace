<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingUser extends Model
{
    use HasFactory;

    protected $table = 'pending_users';
    protected $primaryKey = 'pending_user_id';

    protected $fillable = [
        'name', 'surname', 'email', 'password', 'email_verification_token'
    ];
    
}
