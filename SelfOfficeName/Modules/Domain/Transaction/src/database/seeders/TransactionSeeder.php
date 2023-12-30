<?php

namespace Selfofficename\Modules\Domain\Transaction\database\seeders;

use Illuminate\Database\Seeder;
use Selfofficename\Modules\Domain\Transaction\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::factory(20)->create();
    }
}
