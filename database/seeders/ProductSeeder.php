<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    protected mixed $faker;

    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    public function run(): void
    {
        Product::factory()
            ->count(25)
            ->create()->each(function ($product) {
                $imageUrl = $this->faker->imageUrl(360, 360, 'animals', true, 'cats');
                $product->addMediaFromUrl($imageUrl)->toMediaCollection('default');
            });
    }
}