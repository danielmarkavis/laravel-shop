<x-guest-layout>
    <div class="container mx-auto">
        @if(session('cart'))
            <div class="grid grid-cols-2 gap-2">
                <div class="p-5 rounded-lg">
                    <form action="/checkout" method="post">
                        @csrf

                        @if(count($addresses))
                            <h2 class="text-xl mb-3">Where should we send it</h2>
                            @foreach($addresses as $address)
                                <div class="border mb-3 px-3 py-2 flex flex-row items-center">
                                    <input type="radio" id="address_id" name="address_id" value="{{$address->id}}" class="mr-3"/>
                                    <ul>
                                        <li>{{$address->first_name}} {{$address->last_name}}</li>
                                        <li>{{$address->street_address_1}}</li>
                                        @if($address->street_address_2)
                                            <li>{{$address->street_name_2}}</li>
                                        @endif
                                        <li>{{$address->town}}, {{$address->county}}, {{$address->postcode}}</li>
                                        <li>{{$address->country}}</li>
                                        <li>{{$address->phone_number}}</li>
                                    </ul>
                                </div>
                            @endforeach

                            <div class="py-5">- or -</div>
                        @endif

                        <h2 class="text-xl mb-3">Add address</h2>

                        <div class="mb-2">
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
                            <input value="john" type="text" id="first_name" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @if($errors->has('first_name'))
                                <div class="text-red-500">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                        <div class="mb-2">
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
                            <input value="wick" type="text" id="last_name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="">
                            @if($errors->has('last_name'))
                                <div class="text-red-500">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                        <div class="mb-2">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">Phone number</label>
                            <input value="07666766766" type="tel" id="phone_number" name="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @if($errors->has('phone_number'))
                                <div class="text-red-500">{{ $errors->first('phone_number') }}</div>
                            @endif
                        </div>

                        <fieldset>
                            <legend class="label">
                                <span>Street Address</span>
                            </legend>
                            <div class="mb-2">
                                <input value="The Continental Hotel" type="text" id="street_address_1" name="street_address_1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @if($errors->has('street_address_1'))
                                    <div class="text-red-500">{{ $errors->first('street_address_1') }}</div>
                                @endif
                            </div>
                            <div class="mb-2">
                                <input type="text" id="street_address_2" name="street_address_2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @if($errors->has('street_address_2'))
                                    <div class="text-red-500">{{ $errors->first('street_address_2') }}</div>
                                @endif
                            </div>
                        </fieldset>

                        <div class="mb-2">
                            <label for="town" class="block mb-2 text-sm font-medium text-gray-900">Town</label>
                            <input value="New York" type="text" id="town" name="town" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @if($errors->has('town'))
                                <div class="text-red-500">{{ $errors->first('town') }}</div>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="county" class="block mb-2 text-sm font-medium text-gray-900">County</label>
                            <input value="New York" type="text" id="county" name="county" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @if($errors->has('county'))
                                <div class="text-red-500">{{ $errors->first('county') }}</div>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="postcode" class="block mb-2 text-sm font-medium text-gray-900">Postcode</label>
                            <input value="NR11 8TE" type="text" id="postcode" name="postcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @if($errors->has('post_code'))
                                <div class="text-red-500">{{ $errors->first('post_code') }}</div>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="country" class="block mb-2 text-sm font-medium text-gray-900">Country</label>
                            <select name="country" id="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value=""></option>
                                <option data-title="Guernsey" value="Guernsey">Guernsey</option>
                                <option data-title="Ireland" value="Ireland">Ireland</option>
                                <option data-title="Isle of Man" value="Isle of Man">Isle of Man</option>
                                <option data-title="Jersey" value="Jersey">Jersey</option>
                                <option data-title="United Kingdom" value="United Kingdom" selected>United Kingdom</option>
                            </select>
                            @if($errors->has('country'))
                                <div class="bg-red-500">{{ $errors->first('country') }}</div>
                            @endif
                        </div>

                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                                <input checked id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required>
                            </div>
                            <label for="remember" class="ml-2 text-sm font-medium text-gray-500">I agree with the <a href="#" class="text-blue-600 hover:underline">terms and conditions</a>.</label>
                        </div>
                        <div class="flex flex-row pt-5">
                            <button type="submit" class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 ml-2 mb-2 focus:outline-none">Proceed to Payment</button>
                        </div>
                    </form>
                </div>

                <div class="p-5">
                    <h2 class="text-xl mb-5 font-bold">Order summary</h2>
                    <div class="flex flex-row justify-between">
                        <div>
                            Sub-Total
                        </div>
                        <div class="text-lg">
                            &pound;{{number_format($total, 2)}}
                        </div>
                    </div>
                    <div class="flex flex-row justify-between">
                        <div>
                            VAT
                        </div>
                        <div class="text-lg">
                            &pound;{{number_format($total - ($total/120)*100, 2)}}
                        </div>
                    </div>
                    <div class="flex flex-row justify-between font-bold">
                        <div>
                            Total
                        </div>
                        <div class="text-xl">
                            &pound;{{number_format($total, 2)}}
                        </div>
                    </div>

                    <hr class="my-5">

                    <h2 class="text-xl">Items in cart</h2>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach(session('cart') as $id => $details)
                            <img src="{{ $details['image'] }}" alt="image" class="h-48"/>

                            <div class="flex flex-col">
                                <p class="text-md uppercase">{{ $details['name'] }}</p>
                                <p class="">Sku: <span class="uppercase text-gray-500">{{ $details['sku'] }}</span></p>
                                <p class="">Colour: <span class="uppercase text-gray-500">{{ $details['colour'] }}</span></p>
                                <p class="">Size: <span class="uppercase text-gray-500">{{ $details['size'] }}</span></p>

                                <div class="text-xl my-2">&pound;{{ number_format($details['price'],2) }}</div>

                                <div class="text-xl my-2"> Qty: {{ $details['quantity'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            Your cart is empty!
        @endif
    </div>
</x-guest-layout>