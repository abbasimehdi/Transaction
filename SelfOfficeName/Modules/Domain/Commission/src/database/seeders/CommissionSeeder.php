<?php

namespace Selfofficename\Modules\Domain\Commission\database\seeders;

use Illuminate\Database\Seeder;
use Selfofficename\Modules\Domain\Commission\Models\Commission;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commission::factory(40)->create();
    }
}
