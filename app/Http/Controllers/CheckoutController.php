<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutStoreRequest;
use App\Services\CartService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CartService $cart): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = $cart->get();
        $total = $cart->totalPrice();

        return view('pages.checkout.index', compact('products','total'));
    }

    public function store(CheckoutStoreRequest $request, CartService $cart): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();

        $products = $cart->get();
        $total = $cart->totalPrice();

        $validated = $request->validated();
        return view('pages.payment.index', compact('products','total'));
    }

}
