<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
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
                                <p class="text-lg uppercase">{{ $details['name'] }}</p>
                                <p class="">Sku: <span class="uppercase text-gray-500">{{ $details['sku'] }}</span></p>
                                <p class="">Colour: <span class="uppercase text-gray-500">{{ $details['colour'] }}</span></p>
                                <p class="">Size: <span class="uppercase text-gray-500">{{ $details['size'] }}</span></p>
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
        <div class="flex flex-row justify-between">
            <div>
                Total:
            </div>
            <div class="text-xl">
                &pound;{{number_format($order->total, 2)}}
            </div>
        </div>
    </div>
</x-app-layout>
