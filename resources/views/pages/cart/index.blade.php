<x-guest-layout>
    <div class="container mx-auto">
        @if(session('cart'))
            <div class="grid grid-cols-2 gap-2">
                @foreach(session('cart') as $id => $details)
                    <img src="{{ $details['image'] }}" alt="image" class="h-64"/>

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
                                    <p class="text-lg uppercase">{{ $details['name'] }}</p>
                                    <p class="">Sku: <span class="uppercase text-gray-500">{{ $details['sku'] }}</span></p>
                                    <p class="">Colour: <span class="uppercase text-gray-500">{{ $details['colour'] }}</span></p>
                                    <p class="">Size: <span class="uppercase text-gray-500">{{ $details['size'] }}</span></p>
                                    <div class=""> Quantity: {{ $details['quantity'] }}</div>
                                    <div class="flex mt-5">
                                        <a href="/delete-from-cart/{{$details['sku']}}" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right align-top">
                                    <div class="text-xl">&pound;{{ number_format($details['price'],2) }}</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
            <hr class="my-5">
            <div class="flex flex-row justify-between">
                <div>
                    Total:
                </div>
                <div class="text-xl">
                    &pound;{{number_format($total, 2)}}
                </div>
            </div>
            <div class="flex flex-row justify-end pt-5">
                <a href="/checkout" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 ml-2 mb-2 focus:outline-none">Checkout</a>
            </div>
        @else
            Your cart is empty!
        @endif
    </div>
</x-guest-layout>