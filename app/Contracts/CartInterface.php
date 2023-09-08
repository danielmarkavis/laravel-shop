<?php

namespace App\Contracts;

use App\Models\Variant;

interface CartInterface
{
    public function store(Variant $variant): void;
    public function destroy(string $sku): void;
    public function get();

    public function totalPrice():int;
}