<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationsSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            ['province_id' => 1, 'category_id' => 1, 'name_en' => 'Phnom Penh', 'name_km' => 'ភ្នំពេញ', 'description_en' => 'Capital city', 'description_km' => 'ក្បត់ពេញ', 'address' => 'Phnom Penh, Cambodia', 'latitude' => 11.556389, 'longitude' => 104.928333, 'entrance_fee' => 0, 'opening_time' => '08:00:00', 'closing_time' => '20:00:00', 'image_url' => null, 'status' => 'active'],
            ['province_id' => 2, 'category_id' => 1, 'name_en' => 'Battambang', 'name_km' => 'បាត់ដំបង', 'description_en' => 'Second largest city', 'description_km' => 'ក្បត់ទីនជ័យ', 'address' => 'Battambang, Cambodia', 'latitude' => 13.116667, 'longitude' => 103.842222, 'entrance_fee' => 0, 'opening_time' => '08:00:00', 'closing_time' => '18:00:00', 'image_url' => null, 'status' => 'active'],
            ['province_id' => 3, 'category_id' => 1, 'name_en' => 'Kampong Cham', 'name_km' => 'កំពង់ចេញ', 'description_en' => 'Largest province by population', 'description_km' => 'ចេញចេញខេត្តើស្រួនជាច្នួនិត', 'address' => 'Kampong Cham, Cambodia', 'latitude' => 12.133333, 'longitude' => 105.466667, 'entrance_fee' => 0, 'opening_time' => '08:00:00', 'closing_time' => '18:00:00', 'image_url' => null, 'status' => 'active'],
            ['province_id' => 4, 'category_id' => 1, 'name_en' => 'Kampong Chhnang', 'name_km' => 'កំពង់ឈ្នោង', 'description_en' => 'Floating villages', 'description_km' => 'ភូមិលិនា', 'address' => 'Kampong Chhnang, Cambodia', 'latitude' => 12.083333, 'longitude' => 104.816667, 'entrance_fee' => 0, 'opening_time' => '08:00:00', 'closing_time' => '18:00:00', 'image_url' => null, 'status' => 'active'],
            ['province_id' => 5, 'category_id' => 1, 'name_en' => 'Kampong Speu', 'name_km' => 'កំពង់ស្ពឺ', 'description_en' => 'Bokor Mountain', 'description_km' => 'ភូមិលិនាភូមិនា', 'address' => 'Kampong Speu, Cambodia', 'latitude' => 11.366667, 'longitude' => 104.5, 'entrance_fee' => 0, 'opening_time' => '08:00:00', 'closing_time' => '18:00:00', 'image_url' => null, 'status' => 'active'],
            ['province_id' => 6, 'category_id' => 1, 'name_en' => 'Kampot', 'name_km' => 'កំពត', 'description_en' => 'Kampot Pepper', 'description_km' => 'កាហ្វេប្បកំពត', 'address' => 'Kampot, Cambodia', 'latitude' => 10.466667, 'longitude' => 104.183333, 'entrance_fee' => 0, 'opening_time' => '08:00:00', 'closing_time' => '18:00:00', 'image_url' => null, 'status' => 'active'],
            ['province_id' => 7, 'category_id' => 1, 'name_en' => 'Kandal', 'name_km' => 'កណ្តាល', 'description_en' => 'Near Phnom Penh', 'description_km' => 'ដោយពេញ', 'address' => 'Kandal, Cambodia', 'latitude' => 11.5, 'longitude' => 105.0, 'entrance_fee' => 0, 'opening_time' => '08:00:00', 'closing_time' => '18:00:00', 'image_url' => null, 'status' => 'active'],
            ['province_id' => 8, 'category_id' => 1, 'name_en' => 'Koh Kong', 'name_km' => 'កោនគង្ក្កាត់', 'description_en' => 'Cardamom Mountains', 'description_km' => 'ភូមិនាភូមិនាភ្នំពេញ', 'address' => 'Koh Kong, Cambodia', 'latitude' => 11.6, 'longitude' => 103.1, 'entrance_fee' => 0, 'opening_time' => '08:00:00', 'closing_time' => '18:00:00', 'image_url' => null, 'status' => 'active'],
            ['province_id' => 9, 'category_id' => 1, 'name_en' => 'Kratie', 'name_km' => 'ក្រសួង', 'description_en' => 'Irrawaddy dolphins', 'description_km' => 'ជ្ញាមូលីការ៉ីម៉ាន់', 'address' => 'Kratie, Cambodia', 'latitude' => 12.5, 'longitude' => 106.0, 'entrance_fee' => 0, 'opening_time' => '08:00:00', 'closing_time' => '18:00:00', 'image_url' => null, 'status' => 'active'],
            ['province_id' => 10, 'category_id' => 1, 'name_en' => 'Mondulkiri', 'name_km' => 'មណ្ឌលគីរី', 'description_en' => 'Elephant sanctuary', 'description_km' => 'រមាប់ដំឡឹកការ៉ូន័ណៈ', 'address' => 'Mondulkiri, Cambodia', 'latitude' => 12.0, 'longitude' => 107.0, 'entrance_fee' => 0, 'opening_time' => '08:00:00', 'closing_time' => '18:00:00', 'image_url' => null, 'status' => 'active'],
        ];

        DB::table('destinations')->insert($destinations);
    }
}