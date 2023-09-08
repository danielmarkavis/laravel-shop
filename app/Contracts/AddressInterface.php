<?php

namespace App\Contracts;

interface AddressInterface
{
    public function get(int $user_id);
    public function store(array $data): void;
}