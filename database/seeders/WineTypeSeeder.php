<?php

namespace Database\Seeders;

use App\Models\wineType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        wineType::create(['type'=>'Rouge']);
        wineType::create(['type'=>'Blanc']);
        wineType::create(['type'=>'Orange']);
        wineType::create(['type'=>'Rosé']);
        wineType::create(['type'=>'Jaune']);
        wineType::create(['type'=>'Effervescents']);
    }
}
