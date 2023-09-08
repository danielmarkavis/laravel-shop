<?php

namespace Database\Factories;

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
        $value = rand(1,999999);

        return [
            'name' => implode(' ', $this->faker->words(5)),
            'description' => json_encode('<p>'.implode("</p><p>", $this->faker->paragraphs()).'</p>'),
            'price' => rand(10,99),
            'sku' => 'SKU'.str_pad($value, 8, '0', STR_PAD_LEFT)
        ];
    }
}
