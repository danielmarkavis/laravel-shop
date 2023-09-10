<?php

namespace App\Http\Controllers;

use App\Contracts\CartInterface;
use App\Models\Order;
use App\Models\Variant;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderService $orderService): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $orders = $orderService->all();
        return view('pages.account.index', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     */
    public function show(Order $order, Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        dd($order);
        return view('pages.account.show', compact('order'));
    }

}
