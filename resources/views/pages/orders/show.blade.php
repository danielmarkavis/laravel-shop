<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="grid md:grid-cols-2 gap-12 py-12">
        <div>
            <h2 class="text-xl mb-5 font-bold">Order summary</h2>
            <div class="flex flex-row justify-between">
                <div>
                    Sub-Total
                </div>
                <div class="text-lg">
                    &pound;{{number_format($order->subtotal, 2)}}
                </div>
            </div>
            <div class="flex flex-row justify-between">
                <div>
                    VAT
                </div>
                <div class="text-lg">
                    &pound;{{number_format($order->vat, 2)}}
                </div>
            </div>
            <div class="flex flex-row justify-between font-bold">
                <div class="text-xl">
                    Total
                </div>
                <div class="text-xl">
                    &pound;{{number_format($order->total, 2)}}
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-xl font-bold mb-5">Shipping:</h2>
            <ul>
                <li>
                    <div class="text-bold">{{$order->address->first_name}} {{$order->address->last_name}}</div>
                </li>
                <li>
                    {{$order->address->street_address_1}},
                    {{$order->address->street_address_2 ? $order->address->street_address_2.',' : ''}}
                    {{$order->address->town}},
                    {{$order->address->postcode}}</li>
                <li>{{$order->address->country}}</li>
            </ul>
        </div>
        </div>
        <hr/>

        <div class="grid grid-cols-2 gap-2 py-12">
            @foreach($order->products as $id => $details)
                <img src="{{ $details->variant->image->url }}" alt="image" class="h-64"/>

                <div class="flex flex-row">
                    <table class="w-full min-w-full">
                        <thead>
                        <tr>
                            <th class="text-left uppercase pb-5">Details</th>
                            <th class="text-right uppercase pb-5">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="align-top">
                                <p class="text-lg uppercase">{{ $details->variant->product->name }}</p>
                                <p class="">Sku: <span class="uppercase text-gray-500">{{ $details->variant->sku }}</span></p>
                                <p class="">Colour: <span class="uppercase text-gray-500">{{ $details->variant->colour }}</span></p>
                                <p class="">Size: <span class="uppercase text-gray-500">{{ $details->variant->size }}</span></p>
                                <div class=""> Quantity: {{ $details['quantity'] }}</div>
                            </td>
                            <td class="text-right align-top">
                                <div class="text-xl">&pound;{{ number_format($details['price'], 2) }}</div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
        <hr class="my-5">
    </div>
</x-app-layout>
