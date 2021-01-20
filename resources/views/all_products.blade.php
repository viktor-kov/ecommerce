@extends('layouts.products-master')

@section('title')

@section('content')
    <h1>Všetky produkty</h1>
    <ul class="product-section w-4/5 m-auto grid justify-items-center xl:grid-cols-3 gap-4 md:grid-cols-2 sm:grid-cols-1">
        @foreach ($products as $product)
            <div class="product-container w-80 flex flex-col bg-gray-200 shadow-xl" >
                <a href="edit/{{$product->id}}">
                    <div class="product-img">
                        <img src="{{asset('img/'.$product->photo_path)}}" alt="{{$product->name}}" class="h-72 w-80">
                    </div>
                    <div class="product-information p-2">
                        <h2 class="product-title font-semibold"><a href="edit/{{$product->id}}">{{$product->name}}</a></h2>
                        <div class="product-price flex justify-between items-center mt-4">
                            <span class="text-red-600 font-semibold text-lg">{{$product->price}}€</span>
                            <a href="edit/{{$product->id}}" class="text-white bg-red-600 p-1 md:break-words">Upraviť</a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </ul>
@endsection
