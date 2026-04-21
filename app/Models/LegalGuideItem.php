<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalGuideItem extends Model
{
    use HasFactory;

    protected $table = 'legal_guide_items';

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'video_url',
        'instagram_url',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
