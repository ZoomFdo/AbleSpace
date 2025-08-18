<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessibilitySettings extends Model
{
    /** @use HasFactory<\Database\Factories\AccessibilitySettingsFactory> */
    use HasFactory;

    protected $table = 'accessibility_settings';
    protected $primaryKey = 'user_id';
}
