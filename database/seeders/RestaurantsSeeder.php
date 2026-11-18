<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantsSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = [
            ['province_id' => 1, 'destination_id' => 1, 'name' => 'Romdeng', 'description' => 'Traditional Cambodian cuisine', 'address' => 'Street 240, Phnom Penh', 'phone' => '+855 23 218 888', 'email' => 'info@romdeng.com.kh', 'image_url' => 'https://example.com/restaurant1.jpg', 'price_range' => 'high', 'rating' => 4.5, 'latitude' => 11.5675, 'longitude' => 104.9246, 'opening_time' => '08:00:00', 'closing_time' => '22:00:00', 'status' => 'active'],
            ['province_id' => 1, 'destination_id' => 1, 'name' => 'Le Babel', 'description' => 'French-Cambodian fusion', 'address' => 'Street 178, Phnom Penh', 'phone' => '+855 23 214 555', 'email' => 'info@le-babel.com.kh', 'image_url' => 'https://example.com/restaurant2.jpg', 'price_range' => 'high', 'rating' => 4.2, 'latitude' => 11.5620, 'longitude' => 104.9312, 'opening_time' => '07:30:00', 'closing_time' => '23:00:00', 'status' => 'active'],
            ['province_id' => 2, 'destination_id' => 2, 'name' => 'The Rice Spoon', 'description' => 'Local Khmer dishes', 'address' => 'Snor City, Battambang', 'phone' => '+855 53 214 555', 'email' => 'info@ricespoon.com.kh', 'image_url' => 'https://example.com/restaurant3.jpg', 'price_range' => 'medium', 'rating' => 4.0, 'latitude' => 13.1193, 'longitude' => 103.8352, 'opening_time' => '07:00:00', 'closing_time' => '21:00:00', 'status' => 'active'],
            ['province_id' => 3, 'destination_id' => 3, 'name' => 'Tamarind', 'description' => 'Upscale Khmer food', 'address' => 'Riverfront, Kampong Cham', 'phone' => '+855 42 214 555', 'email' => 'info@tamarind-kc.com.kh', 'image_url' => 'https://example.com/restaurant4.jpg', 'price_range' => 'high', 'rating' => 4.7, 'latitude' => 12.5981, 'longitude' => 105.3622, 'opening_time' => '08:00:00', 'closing_time' => '22:30:00', 'status' => 'active'],
            ['province_id' => 4, 'destination_id' => 4, 'name' => 'Fish Amok House', 'description' => 'Specialty in amok', 'address' => 'Kampong Chhnang', 'phone' => '+855 54 214 555', 'email' => 'info@fishamok.com.kh', 'image_url' => 'https://example.com/restaurant5.jpg', 'price_range' => 'medium', 'rating' => 4.3, 'latitude' => 12.1628, 'longitude' => 104.8333, 'opening_time' => '07:00:00', 'closing_time' => '20:00:00', 'status' => 'active'],
            ['province_id' => 5, 'destination_id' => 5, 'name' => 'Peace Café', 'description' => 'Vegetarian-friendly', 'address' => 'Kampong Speu', 'phone' => '+855 55 214 555', 'email' => 'info@peacecafe.com.kh', 'image_url' => 'https://example.com/restaurant6.jpg', 'price_range' => 'low', 'rating' => 4.1, 'latitude' => 11.6328, 'longitude' => 104.5350, 'opening_time' => '07:00:00', 'closing_time' => '21:30:00', 'status' => 'active'],
            ['province_id' => 6, 'destination_id' => 6, 'name' => 'Kampot Crab', 'description' => 'Fresh seafood', 'address' => 'Kampot', 'phone' => '+855 53 214 555', 'email' => 'info@kampotcrab.com.kh', 'image_url' => 'https://example.com/restaurant7.jpg', 'price_range' => 'medium', 'rating' => 4.4, 'latitude' => 10.4700, 'longitude' => 104.2000, 'opening_time' => '07:00:00', 'closing_time' => '22:00:00', 'status' => 'active'],
            ['province_id' => 7, 'destination_id' => 7, 'name' => 'Le Bougainvillier', 'description' => 'French restaurant', 'address' => 'Kandal', 'phone' => '+855 23 214 555', 'email' => 'info@le-bougainvillier.com.kh', 'image_url' => 'https://example.com/restaurant8.jpg', 'price_range' => 'high', 'rating' => 4.6, 'latitude' => 11.5374, 'longitude' => 104.9445, 'opening_time' => '07:30:00', 'closing_time' => '23:00:00', 'status' => 'active'],
            ['province_id' => 8, 'destination_id' => 8, 'name' => 'Koh Kong Seafood', 'description' => 'Fresh catch of the day', 'address' => 'Koh Kong', 'phone' => '+855 55 214 555', 'email' => 'info@kohkongseafood.com.kh', 'image_url' => 'https://example.com/restaurant9.jpg', 'price_range' => 'medium', 'rating' => 4.2, 'latitude' => 10.5300, 'longitude' => 103.1300, 'opening_time' => '07:00:00', 'closing_time' => '21:00:00', 'status' => 'active'],
            ['province_id' => 9, 'destination_id' => 9, 'name' => 'Mondulkiri Kitchen', 'description' => 'Indigenous dishes', 'address' => 'Mondulkiri', 'phone' => '+855 55 214 555', 'email' => 'info@mondulkirikitchen.com.kh', 'image_url' => 'https://example.com/restaurant10.jpg', 'price_range' => 'low', 'rating' => 4.0, 'latitude' => 12.1667, 'longitude' => 107.2000, 'opening_time' => '07:00:00', 'closing_time' => '20:00:00', 'status' => 'active'],
        ];

        DB::table('restaurants')->insert($restaurants);
    }
}