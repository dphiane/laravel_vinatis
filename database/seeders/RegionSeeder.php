<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::create(['name'=> 'Alsace']);
        Region::create(['name'=> 'Bourgogne']);
        Region::create(['name'=> 'Bordeaux']);
        Region::create(['name'=> 'Rhône']);
        Region::create(['name'=> 'Languedoc-Roussillon']);
        Region::create(['name'=> 'Loire']);
        Region::create(['name'=> 'Sud-Ouest']);
        Region::create(['name'=> 'Beaujolais']);
        Region::create(['name'=> 'Provence-Alpes-Côte d\'Azur']);
    }
}
