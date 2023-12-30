<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Selfofficename\Modules\Domain\Product\database\seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
             ProductSeeder::class,
             UserSeeder::class
         ]);
    }
}
