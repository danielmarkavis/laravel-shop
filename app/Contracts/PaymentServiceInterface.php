<?php

namespace App\Contracts;

interface PaymentServiceInterface
{
    public const PAYMENT_SUCCESSFUL = 'success';

    public function execute();
}