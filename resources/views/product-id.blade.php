@extends('layouts.master')


@section('content')
    <div class="main-container shadow-xl">
        <section class="grid grid-cols-2 mt-4">
            <img src="{{asset('img/'.$product->photo_path)}}" alt="" class="w-200">
            <div class="product-informations m-5">
                <h1 class="text-4xl">{{$product->name}}</h1>
                <p class="mt-4 h-64 overflow-y-auto p-2 border-l bg-gray-100 shadow-xl">{{$product->text}}</p>
                <aside class="pricin pt-6 pb-6">
                    <p class="flex justify-between text-gray-400">Cena s DPH <span>{{$product->price}}€</span></p>
                    <p class="flex justify-between text-gray-400">Cena bez DPH <span>{{$product->without_dph}}€</span></p>
                </aside>
                <aside class="buy-buttons flex justify-evenly">
                    <a href="" class="w-2/5 p-4 text-center bg-green-400 text-white">Kúpiť</a>
                    <a href="" class="w-2/5 p-4 text-center bg-black text-white">Kúpiť urýchlene</a>
                </aside>
            </div>
        </section>
    </div>

@endsection


@section('often-bought')
<ul class="grid grid-cols-4 gap-x-2 mt-10">
    @foreach ($featured_products as $featured_product) 
        <li class="product-container w-9/10  flex flex-col bg-gray-200 shadow-xl" >
            <a href="../{{$featured_product->category}}/{{$featured_product->slug}}">
                <div class="product-img">
                    <img src="{{asset('img/'.$featured_product->photo_path)}}" alt="{{$featured_product->name}}">
                </div>
                <div class="product-information p-2">
                    <h2 class="product-title font-semibold"><a href="../{{$featured_product->category}}/{{$featured_product->slug}}">{{$featured_product->name}}</a></h2>
                    <div class="product-price flex justify-between items-center mt-4">
                        <span class="text-red-600 font-semibold text-lg">{{$featured_product->price}}€</span>
                        <a href="" class="text-white bg-green-400 p-1 md:break-words">Vložiť do košíka</a>
                    </div>
                </div>
            </a>
        </li>
    @endforeach
</ul>
@endsection
