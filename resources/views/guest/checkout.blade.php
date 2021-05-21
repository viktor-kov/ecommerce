@extends('layouts.master')

@section('extra-js')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
@endsection

@section('extra-css')

@endsection

@section('content')
<section>
    <h1 class="text-3xl">{{__('checkout.ship-adress')}}</h1>
    <section class="grid grid-cols-1 md:grid-cols-2 w-full h-min-screen">
        <section>
            <form action="{{route('checkout.store')}}" method="post" class="p-1" id="checkout_form">
                @csrf
                <p class="w-full block">
                    {{__('profile.name')}} <input type="text" name="name" value="@if ( old('name') ) {{old('name')}} @elseif ( $informations ) {{$informations->name}} @endif" class="border border-black block outline-none w-full p-1" placeholder="Name" required>
                </p>
                <p class="w-full block">
                    {{__('profile.lastname')}} <input type="text" name="lastname" value="@if ( old('lastname') ) {{old('lastname')}} @elseif ( $informations ) {{$informations->lastname}} @endif" class="border border-black block outline-none w-full p-1" placeholder="Lastname" required>
                </p>
                <p>
                    {{__('profile.email')}} <input type="email" name="email" value="@if ( old('email') ) {{old('email')}} @elseif ( auth()->check() ) {{auth()->user()->email}} @endif" class="border border-black block outline-none w-full p-1" placeholder="email@email.com" required>
                </p>
                <p>
                    {{__('profile.town')}} <input type="text" name="town" value="@if ( old('town') ) {{old('town')}} @elseif ( $informations ) {{$informations->town}} @endif" class="border border-black block p-1 outline-none w-full" placeholder="Bratislava" required>
                </p>
                <p>
                    {{__('profile.zip')}} <input type="text" name="psc" value="@if ( old('psc') ) {{old('psc')}} @elseif ( $informations ) {{$informations->psc}} @endif" class="border border-black block p-1 outline-none w-full" placeholder="81103" required>
                </p>
                <p>
                    {{__('profile.street')}} <input type="text" name="street" value="@if ( old('street') ) {{old('street')}} @elseif ( $informations ) {{$informations->street}} @endif" class="border border-black block p-1 outline-none w-full" placeholder="Dúbravka" required>
                </p>
                <p>
                    {{__('profile.house-id')}} <input type="text" name="house_id" value="@if ( old('house_id') ) {{old('house_id')}} @elseif ( $informations ) {{$informations->house_id}} @endif" class="border border-black block p-1 outline-none w-full" placeholder="456" required>
                </p>
                <p>
                    {{__('profile.phone-number')}} <input type="text" name="phone_number" value="@if ( old('phone_number') ) {{old('phone_number')}} @elseif ( $informations ) {{$informations->phone_number}} @endif" class="border border-black block p-1 outline-none w-full" placeholder="0918250120" required>
                </p>
                <p>
                    {{__('checkout.card-number')}} <input type="text" name="card_number" class="border border-black block p-1 outline-none w-full" value="{{ old('card_number') }}" placeholder="4242 4242 4242 4242" required>
                </p>
                <p>
                    {{__('checkout.card-exp-month')}} <input type="text" name="card_exp_month" class="border border-black block p-1 outline-none w-full" value="{{ old('card_exp_month') }}" placeholder="01" required>
                </p>
                <p>
                    {{__('checkout.card-exp-year')}} <input type="text" name="card_exp_year" class="border border-black block p-1 outline-none w-full" value="{{ old('card_exp_year') }}" placeholder="2025" required>
                </p>
                <p>
                    {{__('checkout.card-cvc')}} <input type="text" name="card_cvc" class="border border-black block p-1 outline-none w-full" value="{{ old('card_cvc') }}" placeholder="456" required>
                </p>
                <p>
                    <button type="submit" id="submitButton" class="p-4 w-full text-white text-xl mt-4 inline-block bg-green-400 cursor-pointer">{{__('checkout.total-sum')}} {{Cart::subtotal()}}€</button>
                </p>
            </form>
        </section>
            <section class="h-3/5 overflow-y-auto">
                <ul>
                    @foreach (Cart::content() as $product)
                        <li class="mb-2 flex border-b border-black">
                            <section class="grid grid-cols-3 md:grid-cols-4 justify-around p-2 text-sm md:text-xl w-full">
                                <a href="{{route('product.show', ['id' => $product->options->category, 'slug' => $product->options->slug ])}}" class="hidden md:block">
                                    <img src="{{asset('img/'.$product->options->product_photo)}}"  alt="{{$product->name}}" class="h-24 w-auto">
                                </a>
                                <h1 class="grid items-center">
                                    <a href="{{route('product.show', ['id' => $product->options->category, 'slug' => $product->options->slug ])}}">
                                        {{$product->name}}
                                    </a>
                                </h1>
                                <h1 class="place-self-center">{{$product->qty}}</h1>
                                <h2 class="place-self-center">{{number_format($product->price, 2)}}€</h2>
                            </section>
                        </li>
                    @endforeach
                </ul>
            </section>
        </section>
</section>
@endsection

