<?php

namespace App\Services;

use App\Contracts\AddressInterface;
use App\Models\Address;

class AddressService implements AddressInterface
{
    public function get(int $user_id)
    {
        return Address::where('user_id', $user_id);
    }

    public function store(array $data): void
    {
        $address = new Address();
        $address->user_id = auth()->user()->id;
        $address->first_name = $data['first_name'];
        $address->last_name = $data['last_name'];
        $address->phone_number = $data['phone_number'];
        $address->street_address_1 = $data['street_address_1'];
        $address->street_address_2 = $data['street_address_2'];
        $address->town = $data['town'];
        $address->county = $data['county'];
        $address->postcode = $data['postcode'];
        $address->country = $data['country'];
        $address->save();
    }
}
