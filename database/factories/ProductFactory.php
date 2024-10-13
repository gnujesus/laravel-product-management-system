<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'price' => $this->faker->randomFloat(2, 9, 99),
            'stock_amount' => $this->faker->numberBetween(100, 1000),
            'storage_id' => Storage::factory(),
            'owner_id' => User::factory(),
        ];
    }
}
