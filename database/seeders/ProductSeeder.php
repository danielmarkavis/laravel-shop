<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Variant;
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
        $products = Product::factory()
            ->count(25)
            ->hasVariants(rand(2, 5))
            ->create()
            ->each(
            /**
             * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded
             * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
             * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
             */ function(Product $product) {
                foreach ($product->variants as $variant) {
                    $color = match ($variant['colour']) {
                        'red' => 'FF0000',
                        'green' => '00FF00',
                        'blue' => '0000FF',
                        'yellow' => 'FFFF00',
                        default => 'FFC0CB'
                    };

                    $imageUrl = sprintf("https://placehold.co/360x360/%s/FFFFFF/png", $color);
                    $variant->addMediaFromUrl($imageUrl)->toMediaCollection('default');
                }

                $imageUrl = $product->variants[0]->image->url;
                $product->addMediaFromUrl($imageUrl)->toMediaCollection('default');
            });
    }

}