@extends('layouts.master')


@section('content')
    <div class="main-container shadow-xl">
        <section class="grid grid-cols-2 mt-4 p-8">
            <img src="{{asset('img/'.$product->photo_path)}}" alt="" class="h-200">
            <div class="product-informations">
                <h1 class="text-4xl">{{$product->name}}</h1>
                <p class="mt-4 h-64 overflow-y-auto p-2 border border-dashed">{{$product->text}}</p>
                <aside class="pricin mt-6 mb-6 p-2 bg-gray-200">
                    <p class="flex justify-between">{{__('products.with-dph')}} <span class="font-extrabold text-xl">{{$product->price}}€</span></p>
                    <p class="flex justify-between text-gray-400">{{__('products.without-dph')}} <span>{{$product->without_dph}}€</span></p>
                </aside>
                <aside class="buy-buttons">
                    <form action="{{route('cart.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->slug}}">
                        <input type="hidden" name="product_name" value="{{$product->name}}">
                        <input type="hidden" name="product_category" value="{{$product->category}}">
                        <input type="submit" value="{{__('products.add-to-cart')}}" class="p-4 bg-green-400 text-white cursor-pointer w-full block">
                    </form>
                </aside>
            </div>
        </section>
        @include($specification_view)
    </div>


@endsection



@section('often-bought')
<ul class="hidden md:grid md:grid-cols-2 lg:grid-cols-4 gap-x-2 mt-10 mb-10">
    @foreach ($featured_products as $featured_product) 
        <li class="product-container bg-gray-200 shadow-xl h-100">
            <a href="{{route('product.show', $featured_product->category)}}/{{$featured_product->slug}}">
                <div class="product-img">
                    <img src="{{asset('img/'.$featured_product->photo_path)}}" alt="{{$featured_product->name}}" class="h-72 w-full">
                </div>
                <div class="product-information p-2">
                    <h2 class="h-10 git font-semibold"><a href="../{{$featured_product->category}}/{{$featured_product->slug}}">{{$featured_product->name}}</a></h2>
                    <div class="product-price flex justify-between items-center mt-4">
                        <span class="text-red-600 font-semibold text-lg">{{$featured_product->price}}€</span>
                        <form action="{{route('cart.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$featured_product->slug}}">
                            <input type="hidden" name="product_name" value="{{$featured_product->name}}">
                            <input type="hidden" name="product_category" value="{{$featured_product->category}}">
                            <input type="submit" value="{{__('products.add-to-cart')}}" class="p-4 bg-green-400 text-white cursor-pointer">
                        </form>
                    </div>
                </div>
            </a>
        </li>
    @endforeach
</ul>
@endsection

@section('reviews')
    <h1 class="text-3xl">Reviews</h1>
    <ul class="flex overflow-x-auto mb-2">
        @forelse ($reviews as $review)
            <li class="mr-2">
                <section class="w-72 h-72 p-4 border border-dashed relative">
                    <header><strong>&commat;{{$review->name}}</strong></header>
                    <body>{{$review->text}}</body>
                    <footer class="absolute bottom-0 left-0 right-0 text-center text-cool-gray-400">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->created_at)->format('H:i | d.m.Y')}}</footer>
                </section>
            </li>
        @empty
            <li class="text-3xl">No reviews for this product, be the first!</li>
        @endforelse
    </ul>
    @auth
        <section class="border border-dashed">
            <form action="{{route('review.store')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <textarea name="review_text" rows="5"class="w-full" placeholder="Add review"></textarea>
                <button type="submit" class="block w-full p-4 bg-green-400 text-white cursor-pointer">Add review</button>
            </form>
        </section>
    @endauth
@endsection