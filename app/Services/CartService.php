<?php

namespace App\Services;

use App\Contracts\CartInterface;
use App\Models\Variant;

class CartService implements CartInterface
{
    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function get()
    {
        return session()->get('cart', []);
    }

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function store(Variant $variant): void
    {
        $cart = session()->get('cart', []);
        $sku = $variant->sku;
        $product = $variant->product;

        if(isset($cart[$sku])) {
            $cart[$sku]['quantity']++;
        } else {
            $cart[$sku] = [
                "name" => $product->name,
                "id" => $variant->id,
                "sku" => $variant->sku,
                "quantity" => 1,
                "price" => $variant->price,
                "colour" => $variant->colour,
                "size" => $variant->size,
                "image" => $variant->image->url
            ];
        }

        session()->put('cart', $cart);
    }

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function destroy(string $sku): void
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$sku])) {
            unset($cart[$sku]);
        }

        session()->put('cart', $cart);
    }

    public function purge(): void
    {
        session()->put('cart', []);
    }

    public function totalPrice(): int
    {
        $total = 0;

        $cart = session()->get('cart', []);
        if (!count($cart)) {
            return $total;
        }

        foreach ($cart as $details) {
            $total = $total + ($details['price'] * $details['quantity']);
        }

        return $total;
    }

}
