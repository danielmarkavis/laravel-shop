<?php

namespace App\Contracts;

use App\Models\Variant;

interface OrderInterface
{
    public function get();
    public function store(Order $order): void;
    public function destroy(string $sku): void;
}