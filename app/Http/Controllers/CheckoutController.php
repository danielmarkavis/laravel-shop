<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutStoreRequest;
use App\Models\Address;
use App\Services\AddressService;
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

        $addresses = Address::where('user_id', auth()->user()->id)->get();

        return view('pages.checkout.index', compact('products','total', 'addresses'));
    }

    public function store(CheckoutStoreRequest $request, AddressService $address, CartService $cart): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();

        dd($data);

        $address->store($data);

        $products = $cart->get();
        $total = $cart->totalPrice();

        return view('pages.payment.index', compact('products','total'));
    }

}
