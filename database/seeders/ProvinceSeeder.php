<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Province::insert([
            [
                'name' => 'Phnom Penh',
                'description' => 'The capital city of Cambodia, known for its royal palace and rich history.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siem Reap',
                'description' => 'Home to the Angkor Wat temple complex and a major tourist destination.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Battambang',
                'description' => 'Known for its colonial architecture, bamboo train, and countryside.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sihanoukville',
                'description' => 'Coastal province with beautiful beaches and islands.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kampot',
                'description' => 'Famous for pepper plantations, riverside charm, and Bokor Mountain.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
