<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'destination_id',
        'name',
        'description',
        'address',
        'phone',
        'price_range',
        'rating',
        'image_url',
        'latitude',
        'longitude',
        'opening_time',
        'closing_time',
        'status',
    ];
}