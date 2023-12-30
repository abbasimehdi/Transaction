<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Selfofficename\Modules\Domain\Account\database\seeders\AccountSeeder;
use Selfofficename\Modules\Domain\Card\database\seeders\CardSeeder;
use Selfofficename\Modules\Domain\Transaction\database\seeders\TransactionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
             UserSeeder::class,
             AccountSeeder::class,
             CardSeeder::class,
             TransactionSeeder::class,
             \CommissionSeeder::class,
         ]);
    }
}
