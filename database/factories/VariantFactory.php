<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variant>
 */
class VariantFactory extends Factory
{
    public function definition(): array
    {
        $sizeArray = ['xs','sm','md','lg','xl','xxl'];
        $colourArray = ['blue','red','green','yellow'];

        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'size' => $sizeArray[array_rand($sizeArray, 1)],
            'colour' => $colourArray[array_rand($colourArray, 1)],
            'price' => rand(10,99),
            'sku' => 'VAR'.str_pad(rand(1,999999), 8, '0', STR_PAD_LEFT)
        ];
    }
}
