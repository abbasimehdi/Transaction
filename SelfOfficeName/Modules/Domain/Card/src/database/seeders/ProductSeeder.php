<?php

namespace Selfofficename\Modules\Domain\Product\database\seeders;

use Illuminate\Database\Seeder;
use Selfofficename\Modules\Domain\Product\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(20)->create();
    }
}
