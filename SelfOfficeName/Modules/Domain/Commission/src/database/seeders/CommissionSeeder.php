<?php


use Illuminate\Database\Seeder;
use SelfOfficeName\Modules\Domain\commission\src\Models\Commission;

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
