<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentServiceInterface;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CartService $cart): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $products = $cart->get();
        $total = $cart->totalPrice();

        return view('pages.payment.index', compact('products','total'));
    }

    public function store(CartService $cart, PaymentServiceInterface $paymentGateway, OrderService $orderService): View|Application|Factory
    {
        $status = $paymentGateway->execute();

        $orderComplete = $orderService->getSessionOrder();

        $cart->purge();

        $orderComplete->status = $status;
        $orderComplete->save();

        return view('pages.payment.show', compact('orderComplete'));
    }

}
