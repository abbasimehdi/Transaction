<?php

namespace Selfofficename\Modules\Domain\Transaction\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Selfofficename\Modules\Domain\Account\Models\Account;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\InfraStructure\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Selfofficename\Modules\Domain\Transaction\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $source = Card::query()->inRandomOrder()->first()->id;
        return [
            'source_card_id' => $source,
            'destination_card_number' => Card::query()->whereNot('id', $source)->inRandomOrder()->first()->id,
            'amount' => fake()->numberBetween(10000, 100000),
            'status' => fake()->numberBetween(1, 4),
        ];
    }
}
