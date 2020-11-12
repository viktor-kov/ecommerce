@extends('layouts.products-master')

@section('title')

@section('category-name')
    <h1 class="font-bold text-5xl h-32 flex items-center">{{$category_name->category_name}}</h1>
@endsection

@section('content')
@if(!$products->isEmpty())
    <ul class="product-section w-4/5 m-auto grid justify-items-center xl:grid-cols-3 gap-4 md:grid-cols-2 sm:grid-cols-1 ">
        @foreach ($products as $product)
            <div class="product-container w-9/10  flex flex-col bg-gray-200 shadow-xl" >
                <a href="{{$id}}/{{$product->slug}}">
                    <div class="product-img">
                        <img src="../img/grafika.jpg" alt="{{$product->name}}">
                    </div>
                    <div class="product-information p-2">
                        <h2 class="product-title font-semibold"><a href="{{$id}}/{{$product->slug}}">{{$product->name}}</a></h2>
                        <div class="product-price flex justify-between items-center mt-4">
                            <span class="text-red-600 font-semibold text-lg">{{$product->price}}€</span>
                            <a href="" class="text-white bg-green-400 p-1 md:break-words"><button>Vložiť do košíka</button></a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </ul>
@else
    <h1>Žiadne výsledky</h1>
@endif
@endsection
