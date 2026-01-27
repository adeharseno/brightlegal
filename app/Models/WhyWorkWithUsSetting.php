<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyWorkWithUsSetting extends Model
{
    use HasFactory;

    protected $table = 'why_work_with_us_settings';

    protected $fillable = [
        'title_section',
        'subtitle_section',
        'description_section',
    ];
}
