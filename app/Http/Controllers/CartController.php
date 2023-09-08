<?php

namespace App\Http\Controllers;

use App\Contracts\CartInterface;
use App\Models\Variant;
use App\Services\CartService;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CartService $cart): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = $cart->get();
        $total = $cart->totalPrice();
        return view('pages.cart.index', compact('products','total'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Variant $variant, CartInterface $cart): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $cart->store($variant);

        return redirect('cart')->with('success', 'Product added to cart successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $sku, CartInterface $cart): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $cart->destroy($sku);

        return redirect('cart')->with('success', 'Product delete from cart!');
    }
}
