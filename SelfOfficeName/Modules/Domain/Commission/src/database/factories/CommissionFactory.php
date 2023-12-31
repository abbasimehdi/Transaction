<?php

namespace Selfofficename\Modules\Domain\Commission\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Selfofficename\Modules\Domain\Commission\Models\Commission;
use Selfofficename\Modules\Domain\Transaction\Models\Transaction;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Selfofficename\Modules\Domain\Card\Models\Card>
 */
class CommissionFactory extends Factory
{

    protected $model = Commission::class;
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
