<x-guest-layout>
    <div class="container mx-auto" x-data="{selected: null }">
        <div class="grid grid-cols-2 gap-2">
            <div>
                <img :src="selected ? selected.image : '{{$product->variants[0]->image->url}}'" alt="image"/>
                Selected: <span x-text="selected.sku" />
            </div>

            <div class="flex flex-col justify-center">
                <h2 class="font-bold uppercase text-xl pb-3">{{$product->name}}</h2>
                <p class="pb-3 text-xl">&pound;{{number_format($product->price, 2)}}</p>
                <div class="text-gray-600 pb-5">
                    {!! json_decode($product->description) !!}
                </div>
                <hr class="pb-5">
                <div class="flex flex-row flex-wrap gap-2 pb-5">
                    @foreach($product->variants as $variant)
                        <div title="{{$variant->colour}} ({{$variant->sku}})" @click="selected = {'sku':'{{$variant->sku}}','image':'{{$variant->image->url}}'}">
                            <img src="{{$variant->image->url}}" alt="image" class="h-32"/>
                        </div>
                    @endforeach
                </div>
                <div class="options">
                    <button
                            x-bind:disabled="!selected"
                            @click="location.href = '/add-to-cart/'+selected.sku"
                            class="text-white bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none disabled:opacity-25"
                            role="button">Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>>