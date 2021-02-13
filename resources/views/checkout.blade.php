@extends('layouts.master')

@section('extra-js')
    
@endsection

@section('extra-css')

@endsection

@section('content')
<section>
    <h1 class="text-3xl">{{__('checkout.order-info')}}</h1>
    <section class="grid grid-cols-2 w-full min-h-screen">
        <section>
            <form action="./informations_update" method="post" class="p-1">
                @csrf 
                    <p class="w-full block">
                        Meno: <input type="text" name="name" class="border border-black block w-full p-1" @if ($informations) value="{{$informations->name}} @endif">
                    </p>
                    <p class="w-full block">
                    Priezvisko: <input type="text" name="lastname" @if ($informations) value="{{$informations->lastname}} @endif" class="border border-black block w-full p-1">
                    </p>
                    <p>
                        Mesto: <input type="text" name="town" @if ($informations) value="{{$informations->town}}" @endif class="border border-black block p-1 w-full">
                    </p>
                    <p>
                        PSČ: <input type="text" name="psc" @if ($informations) value="{{$informations->psc}}" @endif class="border border-black block p-1 w-full">
                    </p>
                    <p>
                        Ulica: <input type="text" name="street" @if ($informations) value="{{$informations->street}}" @endif class="border border-black block p-1 w-full">
                    </p>
                    <p>
                        Číslo domu: <input type="text" name="house_id" @if ($informations) value="{{$informations->house_id}}" @endif class="border border-black block p-1 w-full">
                    </p>
                    <p>
                        Telefónne číslo: <input type="text" name="phone_number" @if ($informations) value="{{$informations->phone_number}}" @endif class="border border-black block p-1 w-full">
                    </p>
            </form>
        </section>
            <section>
                <ul class="overflow-y-auto h-1/2">
                    @foreach (Cart::content() as $product)
                        <li class="mb-2 flex border-b border-black">
                            <section class="grid grid-cols-4 justify-around p-2 text-xl w-full">
                                <a href="{{route('product.show', $product->options->category)}}/{{$product->id}}">
                                    <img src="{{asset('img/products/'.$product->id.'.jpeg')}}"  alt="{{$product->name}}" class="h-24 w-auto">
                                </a>
                                <h1 class="grid items-center"><a href="{{route('product.show', $product->options->category)}}/{{$product->id}}">{{$product->name}}</a></h1>
                                <h1 class="place-self-center">{{$product->qty}}</h1>
                                <h2 class="place-self-center">{{$product->price}}€</h2>
                            </section>
                        </li>
                    @endforeach
                </ul>
                <p class="p-4 border border-black text-center">
                    Celkovo: <span>{{Cart::subtotal()}}</span>
                </p>
            </section>
        </section>
</section>
@endsection

@section('extra-stuff')

@endsection
