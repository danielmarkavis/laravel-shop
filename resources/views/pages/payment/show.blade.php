<x-guest-layout>
    <div class="container mx-auto">
        <div class="flex flex-row items-center justify-center">
            <div class="bg-green-500 text-white rounded-full p-5 mr-5 my-12">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-12 h-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold">Payment Successful</h2>
        </div>

        <div class="text-center">
            <h2 class="text-xl">Your order <span class="text-gray-500">{{$order->uuid}}</span> is complete</h2>
        </div>

        <div class="grid grid-cols-1 gap-2">
            <div class="p-5 rounded-lg">
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

                <hr class="my-5">

                <div>
                    <div class="grid grid-cols-3 gap-2">
                        @foreach($order->products as $id => $details)
                            <img src="{{ $details->variant->image->url}}" alt="image" class="h-32"/>

                            <div class="flex flex-col">
                                <p class="text-md uppercase">{{ $details->variant->product->name }}</p>
                                <p class="">Sku: <span class="uppercase text-gray-500">{{ $details->variant->sku }}</span></p>
                                <p class="">Colour: <span class="uppercase text-gray-500">{{ $details->variant->colour }}</span></p>
                                <p class="">Size: <span class="uppercase text-gray-500">{{ $details->variant->size }}</span></p>

                                <div class="text-xl my-2"> Qty: {{ $details['quantity'] }}</div>
                            </div>

                            <div class="text-xl my-2 ml-auto">&pound;{{ number_format($details['price'],2) }}</div>
                        @endforeach
                    </div>
                </div>

                <hr class="my-5">

                <div>
                    <h2 class="text-xl font-bold">Shipping:</h2>
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
        </div>
    </div>
</x-guest-layout>