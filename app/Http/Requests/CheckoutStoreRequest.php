<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'phone_number'     => 'required|string|max:255',
            'street_address_1' => 'required|string|max:255',
            'street_address_2' => 'nullable|max:255',
            'town'             => 'required|string|max:255',
            'county'           => 'string|max:255',
            'postcode'         => 'nullable|max:255',
            'country'          => 'required|string|max:255',
        ];
    }

}
