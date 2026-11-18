<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'category_id',
        'name_en',
        'name_km',
        'description_en',
        'description_km',
        'address',
        'latitude',
        'longitude',
        'entrance_fee',
        'opening_time',
        'closing_time',
        'image_url',
        'status',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}