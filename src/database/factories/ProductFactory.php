<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Stock;
use App\Models\Admin;
use App\Models\Category;

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
            'admin_id' => Admin::factory(),
            'name' => $this->faker->name(),
            'information' => $this->faker->realText(100),
            'price' => $this->faker->numberBetween(1, 10000),
            'is_selling' => $this->faker->numberBetween(0, 1),
            'category_id' => Category::factory(),
        ];
    }
}
