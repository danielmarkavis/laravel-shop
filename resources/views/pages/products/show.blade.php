<x-guest-layout>
    <div class="container mx-auto">
        <div class="grid grid-cols-2 gap-2">
            <div>
                <img src="{{$product->image->url}}" alt="image"/>
            </div>

            <div class="flex flex-col justify-center">
                <h2 class="font-bold uppercase text-xl pb-3">{{$product->name}}</h2>
                <p class="pb-3 text-xl">&pound;{{number_format($product->price, 2)}}</p>
                <div class="text-gray-600 pb-5">
                    {!! json_decode($product->description) !!}
                </div>
                <hr class="pb-5">
                <div class="flex flex-row gap-2 pb-5">
                    @foreach($product->variants as $variant)
                        <div class="{{$variant->background}} h-5 w-5 rounded-full" title="{{$variant->colour}}">&nbsp;</div>
                    @endforeach
                </div>
                <div class="options">
                    <a
                        href="{{ route('add.to.cart', $variant->sku) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"
                        role="button">Add to cart
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>>