<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelsSeeder extends Seeder
{
    public function run(): void
    {
        $hotels = [
            ['province_id' => 1, 'destination_id' => 1, 'name' => 'Sun & Moon Hotel', 'description' => 'Luxury hotel in Phnom Penh', 'address' => 'Street 271, Phnom Penh', 'phone' => '+855 23 214 555', 'email' => 'info@sunandmoon.com.kh', 'price_per_night' => 85.50, 'rating' => 4.5, 'image_url' => 'https://example.com/hotel1.jpg', 'latitude' => 11.556389, 'longitude' => 104.928333, 'status' => 'active'],
            ['province_id' => 2, 'destination_id' => 2, 'name' => 'Battambang River Resort', 'description' => 'Riverfront resort in Battambang', 'address' => 'Snor City, Battambang', 'phone' => '+855 53 214 555', 'email' => 'info@battambangriver.com.kh', 'price_per_night' => 45.00, 'rating' => 4.2, 'image_url' => 'https://example.com/hotel2.jpg', 'latitude' => 13.116667, 'longitude' => 103.842222, 'status' => 'active'],
            ['province_id' => 3, 'destination_id' => 3, 'name' => 'Riverside Hotel', 'description' => 'Hotel by the Mekong River', 'address' => 'River Road, Kampong Cham', 'phone' => '+855 42 214 555', 'email' => 'info@riverside-kc.com.kh', 'price_per_night' => 55.00, 'rating' => 4.0, 'image_url' => 'https://example.com/hotel3.jpg', 'latitude' => 12.133333, 'longitude' => 105.466667, 'status' => 'active'],
            ['province_id' => 4, 'destination_id' => 4, 'name' => 'Chhnang Riverside Inn', 'description' => 'Traditional guesthouse', 'address' => 'Near Tonle Sap, Kampong Chhnang', 'phone' => '+855 54 214 555', 'email' => 'info@chhnanginn.com.kh', 'price_per_night' => 35.00, 'rating' => 3.8, 'image_url' => 'https://example.com/hotel4.jpg', 'latitude' => 12.083333, 'longitude' => 104.816667, 'status' => 'active'],
            ['province_id' => 5, 'destination_id' => 5, 'name' => 'Speu Mountain View', 'description' => 'Hotel near Bokor Mountain', 'address' => 'Kampong Speu Province', 'phone' => '+855 55 214 555', 'email' => 'info@speumountain.com.kh', 'price_per_night' => 65.00, 'rating' => 4.3, 'image_url' => 'https://example.com/hotel5.jpg', 'latitude' => 11.366667, 'longitude' => 104.5, 'status' => 'active'],
            ['province_id' => 6, 'destination_id' => 6, 'name' => 'Kampot Boutique Hotel', 'description' => 'Colonial-style boutique hotel', 'address' => 'Market Street, Kampot', 'phone' => '+855 53 214 555', 'email' => 'info@kampotboutique.com.kh', 'price_per_night' => 75.00, 'rating' => 4.7, 'image_url' => 'https://example.com/hotel6.jpg', 'latitude' => 10.466667, 'longitude' => 104.183333, 'status' => 'active'],
            ['province_id' => 7, 'destination_id' => 7, 'name' => 'Kandal City Hotel', 'description' => 'Convenient city hotel', 'address' => 'Near Phnom Penh', 'phone' => '+855 23 214 555', 'email' => 'info@kandalcity.com.kh', 'price_per_night' => 70.00, 'rating' => 4.1, 'image_url' => 'https://example.com/hotel7.jpg', 'latitude' => 11.5, 'longitude' => 105.0, 'status' => 'active'],
            ['province_id' => 8, 'destination_id' => 8, 'name' => 'Koh Kong Coastal Resort', 'description' => 'Beachfront resort', 'address' => 'Ko Kong Province', 'phone' => '+855 55 214 555', 'email' => 'info@kohkongresort.com.kh', 'price_per_night' => 120.00, 'rating' => 4.8, 'image_url' => 'https://example.com/hotel8.jpg', 'latitude' => 11.6, 'longitude' => 103.1, 'status' => 'active'],
            ['province_id' => 9, 'destination_id' => 9, 'name' => 'Kratie River Resort', 'description' => 'Dolphin watching resort', 'address' => 'Kratie Province', 'phone' => '+855 55 214 555', 'email' => 'info@kratieriver.com.kh', 'price_per_night' => 95.00, 'rating' => 4.6, 'image_url' => 'https://example.com/hotel9.jpg', 'latitude' => 12.5, 'longitude' => 106.0, 'status' => 'active'],
            ['province_id' => 10, 'destination_id' => 10, 'name' => 'Mondulkiri Eco Lodge', 'description' => 'Eco-lodge in elephant sanctuary', 'address' => 'Mondulkiri Province', 'phone' => '+855 55 214 555', 'email' => 'info@mondulkiriecolodge.com.kh', 'price_per_night' => 150.00, 'rating' => 4.9, 'image_url' => 'https://example.com/hotel10.jpg', 'latitude' => 12.0, 'longitude' => 107.0, 'status' => 'active'],
        ];

        DB::table('hotels')->insert($hotels);
    }
}