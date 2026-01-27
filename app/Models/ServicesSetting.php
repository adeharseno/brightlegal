<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesSetting extends Model
{
    use HasFactory;

    protected $table = 'services_settings';

    protected $fillable = [
        'title_section',
        'description_section',
    ];
}
