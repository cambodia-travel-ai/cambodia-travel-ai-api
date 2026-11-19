<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Temple',
                'description' => 'Ancient religious temples and pagodas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beach',
                'description' => 'Sandy beaches and coastal attractions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mountain',
                'description' => 'Mountainous areas and hiking destinations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Waterfall',
                'description' => 'Scenic waterfalls and natural springs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Museum',
                'description' => 'Museums and cultural heritage centers.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
