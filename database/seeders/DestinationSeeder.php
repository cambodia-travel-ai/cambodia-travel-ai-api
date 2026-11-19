<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Province;
use App\Models\Category;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tinyPng = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==';

        $provinces = Province::pluck('id')->toArray();
        $categories = Category::pluck('id')->toArray();

        $destinations = [
            [
                'province_id' => $provinces[1],
                'category_id' => $categories[0],
                'name' => 'Angkor Wat',
                'description' => 'The largest religious monument in the world and a UNESCO World Heritage site.',
                'address' => 'Angkor Archaeological Park, Siem Reap',
                'latitude' => 13.4125,
                'longitude' => 103.8670,
                'images' => [$tinyPng, $tinyPng],
            ],
            [
                'province_id' => $provinces[1],
                'category_id' => $categories[0],
                'name' => 'Bayon Temple',
                'description' => 'Famous for its massive stone faces and intricate bas-reliefs.',
                'address' => 'Angkor Thom, Siem Reap',
                'latitude' => 13.4405,
                'longitude' => 103.8594,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[1],
                'category_id' => $categories[0],
                'name' => 'Ta Prohm',
                'description' => 'Known as the Tomb Raider temple, with trees growing out of the ruins.',
                'address' => 'Angkor Archaeological Park, Siem Reap',
                'latitude' => 13.3722,
                'longitude' => 103.8759,
                'images' => [$tinyPng, $tinyPng, $tinyPng],
            ],
            [
                'province_id' => $provinces[0],
                'category_id' => $categories[4],
                'name' => 'Royal Palace',
                'description' => 'The royal residence of the King of Cambodia with stunning Khmer architecture.',
                'address' => 'Sisowath Quay, Phnom Penh',
                'latitude' => 11.5625,
                'longitude' => 104.9261,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[0],
                'category_id' => $categories[4],
                'name' => 'Tuol Sleng Genocide Museum',
                'description' => 'A former high school turned prison and museum documenting Khmer Rouge atrocities.',
                'address' => 'St 113, Phnom Penh',
                'latitude' => 11.5510,
                'longitude' => 104.9249,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[0],
                'category_id' => $categories[4],
                'name' => 'Choeung Ek Genocidal Center',
                'description' => 'The Killing Fields memorial site outside Phnom Penh.',
                'address' => 'Choeung Ek, Phnom Penh',
                'latitude' => 11.4723,
                'longitude' => 104.8555,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[0],
                'category_id' => $categories[0],
                'name' => 'Wat Phnom',
                'description' => 'A Buddhist temple and the namesake hill of Phnom Penh.',
                'address' => 'Wat Phnom, Phnom Penh',
                'latitude' => 11.5668,
                'longitude' => 104.9253,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[2],
                'category_id' => $categories[2],
                'name' => 'Phnom Sampeau',
                'description' => 'A mountain with caves and the famous bamboo train nearby.',
                'address' => 'Battambang',
                'latitude' => 13.0714,
                'longitude' => 103.1500,
                'images' => [$tinyPng, $tinyPng],
            ],
            [
                'province_id' => $provinces[2],
                'category_id' => $categories[0],
                'name' => 'Wat Banan',
                'description' => 'An ancient hilltop temple with Angkor-era architecture.',
                'address' => 'Battambang',
                'latitude' => 13.0000,
                'longitude' => 103.1000,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[3],
                'category_id' => $categories[1],
                'name' => 'Ochheuteal Beach',
                'description' => 'The most popular beach in Sihanoukville with white sand and clear water.',
                'address' => 'Sihanoukville',
                'latitude' => 10.6153,
                'longitude' => 103.5276,
                'images' => [$tinyPng, $tinyPng],
            ],
            [
                'province_id' => $provinces[3],
                'category_id' => $categories[1],
                'name' => 'Koh Rong Island',
                'description' => 'A tropical island paradise with bioluminescent plankton.',
                'address' => 'Sihanoukville',
                'latitude' => 10.6667,
                'longitude' => 103.2500,
                'images' => [$tinyPng, $tinyPng, $tinyPng],
            ],
            [
                'province_id' => $provinces[3],
                'category_id' => $categories[1],
                'name' => 'Serendipity Beach',
                'description' => 'A lively beach area with restaurants and bars.',
                'address' => 'Sihanoukville',
                'latitude' => 10.6200,
                'longitude' => 103.5300,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[4],
                'category_id' => $categories[2],
                'name' => 'Bokor Mountain',
                'description' => 'A mountain resort with French colonial ruins and cool climate.',
                'address' => 'Kampot',
                'latitude' => 10.6167,
                'longitude' => 104.0167,
                'images' => [$tinyPng, $tinyPng],
            ],
            [
                'province_id' => $provinces[4],
                'category_id' => $categories[3],
                'name' => 'Teuk Chhou',
                'description' => 'A natural spring and waterfall area popular with locals.',
                'address' => 'Kampot',
                'latitude' => 10.5833,
                'longitude' => 104.1833,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[4],
                'category_id' => $categories[0],
                'name' => 'Wat Kampot',
                'description' => 'A peaceful riverside pagoda in Kampot town.',
                'address' => 'Kampot',
                'latitude' => 10.6000,
                'longitude' => 104.1833,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[0],
                'category_id' => $categories[3],
                'name' => 'Phnom Penh Waterfall Park',
                'description' => 'A recreational park with artificial waterfalls and gardens.',
                'address' => 'Phnom Penh',
                'latitude' => 11.5500,
                'longitude' => 104.9000,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[1],
                'category_id' => $categories[3],
                'name' => 'Kulen Mountain Waterfall',
                'description' => 'A sacred mountain with waterfalls and the River of a Thousand Lingas.',
                'address' => 'Phnom Kulen, Siem Reap',
                'latitude' => 13.6833,
                'longitude' => 104.0000,
                'images' => [$tinyPng, $tinyPng],
            ],
            [
                'province_id' => $provinces[1],
                'category_id' => $categories[2],
                'name' => 'Phnom Kulen',
                'description' => 'The birthplace of the Khmer Empire with mountain scenery.',
                'address' => 'Siem Reap',
                'latitude' => 13.6833,
                'longitude' => 104.0000,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[2],
                'category_id' => $categories[3],
                'name' => 'Battambang Caves',
                'description' => 'Limestone caves with bat colonies and Buddhist shrines.',
                'address' => 'Battambang',
                'latitude' => 13.1000,
                'longitude' => 103.2000,
                'images' => [$tinyPng],
            ],
            [
                'province_id' => $provinces[3],
                'category_id' => $categories[0],
                'name' => 'Wat Leu',
                'description' => 'A hilltop temple overlooking Sihanoukville.',
                'address' => 'Sihanoukville',
                'latitude' => 10.6200,
                'longitude' => 103.5300,
                'images' => [$tinyPng],
            ],
        ];

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}
