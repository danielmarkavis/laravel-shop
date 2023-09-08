<?php

namespace App\Services;

use App\Contracts\PaymentServiceInterface;

class PaypalGateway implements PaymentServiceInterface
{
    public function execute(): string
    {
        return self::PAYMENT_SUCCESSFUL;
    }
}