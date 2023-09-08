<?php

namespace App\Contracts;

interface PaymentServiceInterface
{
    public const PAYMENT_PENDING = 'pending';
    public const PAYMENT_COMPLETE = 'complete';

    public function execute();
}