<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            ['name_en' => 'Banteay Meanchey', 'name_km' => 'បន្ទាតាមានជ័យ', 'description' => 'Province in northwest Cambodia', 'image_url' => null],
            ['name_en' => 'Battambang', 'name_km' => 'បាត់ដំបង', 'description' => 'Province in northwest Cambodia', 'image_url' => null],
            ['name_en' => 'Kampong Cham', 'name_km' => 'កំពង់ចេញ', 'description' => 'Province in eastern Cambodia', 'image_url' => null],
            ['name_en' => 'Kampong Chhnang', 'name_km' => 'កំពង់ឈ្នោង', 'description' => 'Province in central Cambodia', 'image_url' => null],
            ['name_en' => 'Kampong Speu', 'name_km' => 'កំពង់ស្ពឺ', 'description' => 'Province in central Cambodia', 'image_url' => null],
            ['name_en' => 'Kampot', 'name_km' => 'កំពត', 'description' => 'Province in southern Cambodia', 'image_url' => null],
            ['name_en' => 'Kandal', 'name_km' => 'កណ្តាល', 'description' => 'Province surrounding Phnom Penh', 'image_url' => null],
            ['name_en' => 'Koh Kong', 'name_km' => 'កោនគង្ក្កាត់', 'description' => 'Province in southwestern Cambodia', 'image_url' => null],
            ['name_en' => 'Kratie', 'name_km' => 'ក្រសួង', 'description' => 'Province in northeastern Cambodia', 'image_url' => null],
            ['name_en' => 'Mondulkiri', 'name_km' => 'មណ្ឌលគីរី', 'description' => 'Province in eastern Cambodia', 'image_url' => null],
        ];

        DB::table('provinces')->insert($provinces);
    }
}