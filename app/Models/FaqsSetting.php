<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqsSetting extends Model
{
    use HasFactory;

    protected $table = 'faqs_settings';

    protected $fillable = [
        'title_section',
        'description_section',
    ];
}
