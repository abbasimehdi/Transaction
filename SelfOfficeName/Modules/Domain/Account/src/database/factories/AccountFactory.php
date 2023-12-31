<?php

namespace Selfofficename\Modules\Domain\Account\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Selfofficename\Modules\Domain\Account\Models\Account;
use Selfofficename\Modules\InfraStructure\Models\User;

/**
 * @extends Factory<\Selfofficename\Modules\Domain\Account\Models\Account>
 */
class AccountFactory extends Factory
{
    protected $model = Account::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'number' => fake()->unique()->numberBetween(10),
        ];
    }
}
