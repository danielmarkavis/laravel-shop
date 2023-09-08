<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentServiceInterface;
use App\Services\CartService;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CartService $cart, PaymentServiceInterface $payment): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = $cart->get();
        $total = $cart->totalPrice();

        return view('pages.payment.index', compact('products','total'));
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
