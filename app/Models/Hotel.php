<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'destination_id',
        'name',
        'description',
        'address',
        'phone',
        'email',
        'price_per_night',
        'rating',
        'image_url',
        'latitude',
        'longitude',
        'status',
    ];
}
