<?php

namespace App\Services;

use App\Contracts\PaymentServiceInterface;

class StripGateway implements PaymentServiceInterface
{
    public function execute(): string
    {
        return self::PAYMENT_SUCCESSFUL;
    }
}