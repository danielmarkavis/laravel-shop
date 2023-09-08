<?php

namespace App\Contracts;

use App\Models\Address;
use App\Models\Order;
use App\Services\CartService;

interface OrderInterface
{
    public function get(int $order_id);
    public function store(CartService $cart, Address $address): Order;
}