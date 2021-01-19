@extends('layouts.master')


@section('content')
    <div class="main-container shadow-xl">
        <section class="grid grid-cols-2 mt-4">
            <img src="{{asset('img/'.$product->photo_path)}}" alt="" class="h-200">
            <div class="product-informations m-5">
                <h1 class="text-4xl">{{$product->name}}</h1>
                <p class="mt-4 h-64 overflow-y-auto p-2 border-l bg-gray-100 shadow-xl">{{$product->text}}</p>
                <aside class="pricin pt-6 pb-6">
                    <p class="flex justify-between text-gray-400">Cena s DPH <span>{{$product->price}}€</span></p>
                    <p class="flex justify-between text-gray-400">Cena bez DPH <span>{{$product->without_dph}}€</span></p>
                </aside>
                <aside class="buy-buttons flex justify-evenly">
                    <form action="{{route('cart.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->slug}}">
                        <input type="hidden" name="product_name" value="{{$product->name}}">
                        <input type="hidden" name="product_category" value="{{$product->category}}">
                        <input type="submit" value="Pridať do košíka" class="p-4 bg-green-400 text-white cursor-pointer">
                    </form>
                </aside>
            </div>
        </section>
    </div>

@endsection


@section('often-bought')
<ul class="grid grid-cols-4 gap-x-2 mt-10">
    @foreach ($featured_products as $featured_product) 
        <li class="product-container w-9/10  flex flex-col bg-gray-200 shadow-xl h-100">
            <a href="{{route('product.show', $featured_product->category)}}/{{$featured_product->slug}}">
                <div class="product-img">
                    <img src="{{asset('img/'.$featured_product->photo_path)}}" alt="{{$featured_product->name}}" class="h-72">
                </div>
                <div class="product-information p-2">
                    <h2 class="product-title font-semibold"><a href="../{{$featured_product->category}}/{{$featured_product->slug}}">{{$featured_product->name}}</a></h2>
                    <div class="product-price flex justify-between items-center mt-4">
                        <span class="text-red-600 font-semibold text-lg">{{$featured_product->price}}€</span>
                        <a href="" class="text-white bg-green-400 p-4 md:break-words">Vložiť do košíka</a>
                    </div>
                </div>
            </a>
        </li>
    @endforeach
</ul>
@endsection
