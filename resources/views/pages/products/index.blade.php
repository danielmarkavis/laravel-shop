<x-guest-layout>
    <div class="container mx-auto my-12">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                <a href="{{route('products.show', $product->sku)}}">
                    <div class="bg-gray-200 flex flex-col pt-5 rounded-md">
                        <div class="mx-auto">
                            <img class="h-64" src="{{$product->image->url}}" alt="{{$product->name}}" />
                        </div>
                        <div class="p-5 text-center">
                            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 uppercase">{{$product->name}}</h5>
{{--                            <p class="mb-3 font-normal text-gray-700">{{$product->description}}</p>--}}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-guest-layout>