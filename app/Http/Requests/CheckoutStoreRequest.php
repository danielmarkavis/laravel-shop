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
        $requiredRule = 'required_if:address_id,null|max:255';

        return [
            'address_id'       => 'nullable|string|max:255',
            'first_name'       => $requiredRule,
            'last_name'        => $requiredRule,
            'phone_number'     => $requiredRule,
            'street_address_1' => $requiredRule,
            'street_address_2' => 'nullable|max:255',
            'town'             => $requiredRule,
            'county'           => $requiredRule,
            'postcode'         => $requiredRule,
            'country'          => $requiredRule,
        ];
    }

}
