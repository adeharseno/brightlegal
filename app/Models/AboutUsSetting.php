<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsSetting extends Model
{
    use HasFactory;

    protected $table = 'about_us_settings';

    protected $fillable = [
        // Hero
        'hero_title',
        'hero_subtitle',
        'hero_image_left',
        'hero_image_center',
        'hero_image_right',
        // Mission
        'mission_label',
        'mission_title_line1',
        'mission_title_line2',
        'mission_body_left',
        'mission_body_right',
        'mission_image_1',
        'mission_image_2',
        'mission_image_3',
        // Team
        'team_label',
        'team_title',
        'team_button_text',
        'team_button_link',
        // Clients
        'clients_text',
    ];
}
