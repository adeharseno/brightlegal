<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialsSetting extends Model
{
    use HasFactory;

    protected $table = 'testimonials_settings';

    protected $fillable = [
        'title_section',
        'description_section',
        'button_text',
        'button_link',
    ];
}
