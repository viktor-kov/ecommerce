@extends('layouts.products-master')

@section('title')

@section('category-name')
    @if ($products->isEmpty())
        <h1 class="text-4xl">Žiadne výsledky z gategórie <span class="font-bold">{{$category_name->category_name}}</span></h1>
    @else
        <h1 class="text-4xl"><span class="font-bold">{{$category_name->category_name}}</span></h1>
    @endif
@endsection

@section('content')
@if(!$products->isEmpty())
    <ul class="product-section m-auto grid justify-items-center xl:grid-cols-4 gap-4 md:grid-cols-2 sm:grid-cols-1">
        @foreach ($products as $product)
            <li class="product-container w-80 flex flex-col bg-gray-200 shadow-xl h-100">
                <a href="{{$id}}/{{$product->slug}}">
                    <div class="product-img">
                        <img src="{{asset('img/'.$product->photo_path)}}" alt="{{$product->name}}" class="h-72 w-80">
                    </div>
                    <div class="product-information p-2">
                        <h2 class="product-title font-semibold"><a href="{{$id}}/{{$product->slug}}">{{$product->name}}</a></h2>
                        <div class="product-price flex justify-between items-center mt-4">
                            <span class="text-red-600 font-semibold text-lg">{{$product->price}}€</span>
                            <form action="{{route('cart.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->slug}}">
                                <input type="hidden" name="product_name" value="{{$product->name}}">
                                <input type="hidden" name="product_category" value="{{$product->category}}">
                                <input type="submit" value="Pridať do košíka" class="p-4 bg-green-400 text-white cursor-pointer">
                            </form>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@endif
@endsection
