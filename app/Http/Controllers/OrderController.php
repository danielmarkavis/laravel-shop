<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderService $orderService): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $orders = $orderService->all();
        return view('pages.orders.index', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     */
    public function show(Order $order, Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.orders.show', compact('order'));
    }

}
