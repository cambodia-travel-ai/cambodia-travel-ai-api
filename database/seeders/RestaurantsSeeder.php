<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantsSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = [
            ['name' => 'Romdeng', 'description' => 'Traditional Cambodian cuisine', 'address' => 'Street 240, Phnom Penh', 'phone' => '+855 23 218 888', 'email' => 'info@romdeng.com.kh', 'image_url' => 'https://example.com/restaurant1.jpg', 'status' => 'active'],
            ['name' => 'Le Babel', 'description' => 'French-Cambodian fusion', 'address' => 'Street 178, Phnom Penh', 'phone' => '+855 23 214 555', 'email' => 'info@le-babel.com.kh', 'image_url' => 'https://example.com/restaurant2.jpg', 'status' => 'active'],
            ['name' => 'The Rice Spoon', 'description' => 'Local Khmer dishes', 'address' => 'Snor City, Battambang', 'phone' => '+855 53 214 555', 'email' => 'info@ricespoon.com.kh', 'image_url' => 'https://example.com/restaurant3.jpg', 'status' => 'active'],
            ['name' => 'Tamarind', 'description' => 'Upscale Khmer food', 'address' => 'Riverfront, Kampong Cham', 'phone' => '+855 42 214 555', 'email' => 'info@tamarind-kc.com.kh', 'image_url' => 'https://example.com/restaurant4.jpg', 'status' => 'active'],
            ['name' => 'Fish Amok House', 'description' => 'Specialty in amok', 'address' => 'Kampong Chhnang', 'phone' => '+855 54 214 555', 'email' => 'info@fishamok.com.kh', 'image_url' => 'https://example.com/restaurant5.jpg', 'status' => 'active'],
            ['name' => 'Peace Café', 'description' => 'Vegetarian-friendly', 'address' => 'Kampong Speu', 'phone' => '+855 55 214 555', 'email' => 'info@peacecafe.com.kh', 'image_url' => 'https://example.com/restaurant6.jpg', 'status' => 'active'],
            ['name' => 'Kampot Crab', 'description' => 'Fresh seafood', 'address' => 'Kampot', 'phone' => '+855 53 214 555', 'email' => 'info@kampotcrab.com.kh', 'image_url' => 'https://example.com/restaurant7.jpg', 'status' => 'active'],
            ['name' => 'Le Bougainvillier', 'description' => 'French restaurant', 'address' => 'Kandal', 'phone' => '+855 23 214 555', 'email' => 'info@le-bougainvillier.com.kh', 'image_url' => 'https://example.com/restaurant8.jpg', 'status' => 'active'],
            ['name' => 'Koh Kong Seafood', 'description' => 'Fresh catch of the day', 'address' => 'Koh Kong', 'phone' => '+855 55 214 555', 'email' => 'info@kohkongseafood.com.kh', 'image_url' => 'https://example.com/restaurant9.jpg', 'status' => 'active'],
            ['name' => 'Mondulkiri Kitchen', 'description' => 'Indigenous dishes', 'address' => 'Mondulkiri', 'phone' => '+855 55 214 555', 'email' => 'info@mondulkirikitchen.com.kh', 'image_url' => 'https://example.com/restaurant10.jpg', 'status' => 'active'],
        ];

        DB::table('restaurants')->insert($restaurants);
    }
}