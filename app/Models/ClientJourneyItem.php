<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientJourneyItem extends Model
{
    use HasFactory;

    protected $table = 'client_journey_items';

    protected $fillable = [
        'client_journey_category_id',
        'number',
        'client_type',
        'topic',
        'title',
        'image',
        'challenge',
        'how_we_helped',
        'outcome',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(ClientJourneyCategory::class, 'client_journey_category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
