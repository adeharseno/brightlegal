<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientJourneySetting extends Model
{
    use HasFactory;

    protected $table = 'client_journey_settings';

    protected $fillable = [
        // CTA 1: "Not seeing your exact case?"
        'cta1_title',
        'cta1_description',
        'cta1_button_text',
        'cta1_button_link',
        // CTA 2: "Just starting your research?"
        'cta2_title',
        'cta2_description',
        'cta2_button_text',
        'cta2_button_link',
    ];
}
