<?php

namespace Selfofficename\Modules\Domain\Card\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Selfofficename\Modules\Domain\Account\Models\Account;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\InfraStructure\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Selfofficename\Modules\Domain\Card\Models\Card>
 */
class CardFactory extends Factory
{
    protected $model = Card::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'name',
            'account_id' => Account::query()->inRandomOrder()->first()->id,
            'number' => fake()->unique()->numberBetween(16),
            'expire_date' => fake()->dateTimeBetween( '+2 month',  '+3 years', $timezone = null),
            'cvv2' => fake()->unique()->numberBetween(1000, 9999),
            'amount' => fake()->numberBetween(1000, 100000000),
        ];
    }
}
