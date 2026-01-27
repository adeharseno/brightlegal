<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadyToTalk extends Model
{
    use HasFactory;

    protected $table = 'ready_to_talk';

    protected $fillable = [
        'title',
        'button_text',
        'button_link',
    ];
}
