<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'category_id',
        'name',
        'description',
        'address',
        'latitude',
        'longitude',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
