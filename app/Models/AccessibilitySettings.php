<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperAccessibilitySettings
 */
class AccessibilitySettings extends Model
{
    /** @use HasFactory<\Database\Factories\AccessibilitySettingsFactory> */
    use HasFactory;

    protected $table = 'accessibility_settings';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = ['user_id', 'theme', 'text_size', 'voice_enabled'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
