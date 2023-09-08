<?php

namespace App\Contracts;

use App\Models\Address;
use Illuminate\Support\Collection;

interface AddressInterface
{
    public function getById(int $id): ?Address;
    public function getByUserId(int $user_id): Collection;
    public function store(array $data): Address;
}