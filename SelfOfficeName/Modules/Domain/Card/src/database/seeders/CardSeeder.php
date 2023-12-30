<?php

namespace Selfofficename\Modules\Domain\Card\database\seeders;

use Illuminate\Database\Seeder;
use Selfofficename\Modules\Domain\Card\Models\Card;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::factory(40)->create();
    }
}
