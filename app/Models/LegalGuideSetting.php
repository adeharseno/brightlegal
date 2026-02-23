<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalGuideSetting extends Model
{
    use HasFactory;

    protected $table = 'legal_guide_settings';

    protected $fillable = [
        'page_title',
        'page_subtitle',
        'cta_text',
        'cta_button_text',
        'cta_button_link',
    ];
}
