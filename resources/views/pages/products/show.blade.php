<x-guest-layout>
    <div class="container mx-auto" x-data="{selected: null, variants: {{$product->variants}} }">
        <div class="grid grid-cols-2 gap-2">
            <div>
                <img :src="selected ? selected.image.url : '{{$product->variants[0]->image->url}}'" alt="image"/>
            </div>

            <div class="flex flex-col justify-center">
                <h2 class="font-bold uppercase text-xl pb-3">{{$product->name}}</h2>
                <p class="pb-3 text-xl">&pound;{{number_format($product->price, 2)}}</p>
                <div class="text-gray-600 pb-5">
                    {!! json_decode($product->description) !!}
                </div>
                <hr class="pb-5">

                <div class="flex flex-row flex-wrap gap-2 pb-5">
                    @foreach($product->variants as $index => $variant)
                        <div title="{{$variant}}" @click="selected = {{$variant}}">
                            <div class="bg-{{$variant->colour}}-500 h-6 w-6 rounded-full p-1">
                                <template x-if="selected.sku === '{{$variant->sku}}'">
                                    <span class="text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                        </svg>
                                    </span>
                                </template>
                            </div>
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
                    <template x-if="selected">
                        <div>
                            Selected: <span x-text="selected.sku"></span>, <span class="uppercase" x-text="selected.size"></span>, <span class="uppercase" x-text="selected.colour"></span>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>