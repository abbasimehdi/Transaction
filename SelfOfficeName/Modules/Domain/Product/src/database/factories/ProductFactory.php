<?php

namespace Selfofficename\Modules\Domain\Product\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Selfofficename\Modules\Domain\Product\Models\Product;

/**
 * @extends Factory<\Selfofficename\Modules\Domain\Product\Models\Product>
 */
class ProductFactory extends Factory
{
    use HasFactory;

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(30),
            'image' => fake()->imageUrl(),
        ];
    }
}
