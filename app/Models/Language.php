<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperLanguage
 */
class Language extends Model
{
    /** @use HasFactory<\Database\Factories\LanguageFactory> */
    use HasFactory;

    protected $table = 'languages';
    protected $primaryKey = 'language_code';
    public $incrementing = false;

    protected $fillable = ['language_code', 'language_name', 'locale', 'is_default'];
}
