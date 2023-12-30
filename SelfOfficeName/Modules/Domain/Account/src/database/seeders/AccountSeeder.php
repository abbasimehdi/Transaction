<?php

namespace Selfofficename\Modules\Domain\Account\database\seeders;

use Illuminate\Database\Seeder;
use Selfofficename\Modules\Domain\Account\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::factory(20)->create();
    }
}
