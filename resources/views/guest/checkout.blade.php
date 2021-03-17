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
            <form action="{{route('checkout.store')}}" method="post" class="p-1" id="checkout-form">
                @csrf 
                <p class="w-full block">
                    {{__('profile.name')}} <input type="text" name="name" class="border border-black block w-full p-1" @if ($informations) value="{{$informations->name}} @endif" required>
                </p>
                <p class="w-full block">
                    {{__('profile.lastname')}} <input type="text" name="lastname" @if ($informations) value="{{$informations->lastname}} @endif" class="border border-black block w-full p-1" required>
                </p>
                <p>
                    {{__('profile.email')}} <input type="email" name="email" @if (auth()->user()) value="{{auth()->user()->email}} @endif" class="border border-black block w-full p-1" required>
                </p>
                <p>
                    {{__('profile.town')}} <input type="text" name="town" @if ($informations) value="{{$informations->town}}" @endif class="border border-black block p-1 w-full" required>
                </p>
                <p>
                    {{__('profile.zip')}} <input type="text" name="psc" @if ($informations) value="{{$informations->psc}}" @endif class="border border-black block p-1 w-full" required>
                </p>
                <p>
                    {{__('profile.street')}} <input type="text" name="street" @if ($informations) value="{{$informations->street}}" @endif class="border border-black block p-1 w-full" required>
                </p>
                <p>
                    {{__('profile.house-id')}} <input type="text" name="house_id" @if ($informations) value="{{$informations->house_id}}" @endif class="border border-black block p-1 w-full" required>
                </p>
                <p>
                    {{__('profile.phone-number')}} <input type="text" name="phone_number" @if ($informations) value="{{$informations->phone_number}}" @endif class="border border-black block p-1 w-full" required>
                </p>
                <p>
                    {{__('checkout.card-number')}} <input type="text" name="card_number" class="border border-black block p-1 w-full" required>
                </p>
                <p>
                    {{__('checkout.card-exp-month')}} <input type="text" name="card_exp_month" class="border border-black block p-1 w-full" required>
                </p>
                <p>
                    {{__('checkout.card-exp-year')}} <input type="text" name="card_exp_year" class="border border-black block p-1 w-full" required>
                </p>
                <p>
                    {{__('checkout.card-cvc')}} <input type="text" name="card_cvc" class="border border-black block p-1 w-full" required>
                </p>
                <p>
                    <button type="submit" class="p-4 w-full border border-black mt-4 inline-block bg-green-400 cursor-pointer">{{__('checkout.total-sum')}} {{Cart::subtotal()}}€</button>
                </p>
            </form>
        </section>
            <section class="h-3/5 overflow-y-auto">
                <ul>
                    @foreach (Cart::content() as $product)
                        <li class="mb-2 flex border-b border-black">
                            <section class="grid grid-cols-4 justify-around p-2 text-xl w-full">
                                <a href="{{route('product.show', $product->options->category)}}/{{$product->id}}">
                                    <img src="{{asset('img/'.$product->options->product_photo)}}"  alt="{{$product->name}}" class="h-24 w-auto">
                                </a>
                                <h1 class="grid items-center"><a href="{{route('product.show', $product->options->category)}}/{{$product->id}}">{{$product->name}}</a></h1>
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

@section('extra-stuff')
    <script src="{{asset('js/checkout.js')}}"></script>
@endsection
