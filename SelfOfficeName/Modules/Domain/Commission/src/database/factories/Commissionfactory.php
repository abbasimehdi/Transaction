<?php

namespace Selfofficename\Modules\Domain\Transaction\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Selfofficename\Modules\Domain\Transaction\Models\Transaction;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Selfofficename\Modules\Domain\Card\Models\Card>
 */
class Commissionfactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => Transaction::query()->inRandomOrder()->first()->id,
            'amount' => 5000,
        ];
    }
}
