<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Variant;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
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
        Variant::factory()
            ->count(100)
            ->create()->each(function ($product) {
                $imageUrl = $this->faker->imageUrl(360, 360, 'animals', true, 'cats');
                $product->addMediaFromUrl($imageUrl)->toMediaCollection('default');
            });
    }
}