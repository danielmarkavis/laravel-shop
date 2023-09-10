<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentServiceInterface;
use App\Models\Order;
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

    public function store(CartService $cart, PaymentServiceInterface $paymentGateway, OrderService $orderService): \Illuminate\Http\RedirectResponse
    {
        $status = $paymentGateway->execute();

        $orderComplete = $orderService->getSessionOrder();

        if (!$orderComplete) {
            return redirect()->route('orders.index');
        }

        $orderComplete->status = $status;
        $orderComplete->save();

        $cart->purge();
        $orderService->purgeSession();

        return redirect()->route('payment-complete.success', ['uuid'=> $orderComplete->uuid]);//view('pages.payment.show', compact('orderComplete'));
    }

    public function show(Order $order) {
        return view('pages.payment.show', compact('order'));
    }
}
