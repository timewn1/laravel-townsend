<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArtistsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(StoreProductsTableSeeder::class);
        $this->call(StoreProductsSectionTableSeeder::class);
    }
}
