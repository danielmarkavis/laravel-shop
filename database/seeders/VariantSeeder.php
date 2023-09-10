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
//        Variant::factory()
//            ->count(100)
//            ->create()->each(function ($product) {
//                $color = match ($product->colour) {
//                    'red' => 'FF0000',
//                    'green' => '00FF00',
//                    'blue' => '0000FF',
//                    'yellow' => 'FFFF00',
//                    default => 'FFC0CB'
//                };
//
//                $imageUrl = sprintf("https://placehold.co/360x360/%s/FFFFFF/png", $color);
//                $product->addMediaFromUrl($imageUrl)->toMediaCollection('default');
//            });
    }
}
