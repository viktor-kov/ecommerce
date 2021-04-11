@extends('layouts.master')

@section('messages')
    @if (session()->get('success'))
        @include('messages.success')
    @endif

    @if (session()->get('error'))
        @include('messages.error')
    @endif
@endsection

@section('extra-js')
    
    <script type="text/javascript"> 
        $(document).ready( function() {
            $('#message').delay(5000).fadeOut();
        });
    </script>

@endsection

@section('content')
    <div class="main-container shadow-xl">
        <section class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 mt-4 p-8">
            <img src="{{asset('img/'.$showed_product->photo_path)}}" alt="" class="h-200 mx-auto p-2">
            <div class="product-informations">
                <h1 class="text-4xl">{{$showed_product->name}}</h1>
                <p class="mt-4 h-64 overflow-y-auto p-2 border border-dashed">{{$showed_product->text}}</p>
                <aside class="mt-6 mb-6 p-2 bg-gray-200">
                    <p class="flex justify-between">{{__('products.with-dph')}} <span class="font-extrabold text-xl">{{$showed_product->price}}€</span></p>
                    <p class="flex justify-between text-gray-400">{{__('products.without-dph')}} <span>{{$showed_product->without_dph}}€</span></p>
                </aside>
                <aside class="mt-6 mb-6 p-2 bg-gray-200">
                    <p class="flex justify-between text-lg">{{__('products.in-stock')}} <span>{{$amount}} {{__('products.piece')}}</span></p>
                </aside>
                <aside class="buy-buttons">
                    @if ($amount == 0)
                        <p class="p-4 bg-red-400 text-white w-full block text-center">{{__('products.unavailable')}}</p>
                    @else 
                        <form action="{{route('cart.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$showed_product->slug}}">
                            <input type="hidden" name="product_name" value="{{$showed_product->name}}">
                            <input type="hidden" name="product_category" value="{{$showed_product->category}}">
                            <button type="submit" class="p-4 bg-green-400 text-white cursor-pointer w-full block hover:bg-green-500"><i class="fas fa-shopping-basket mr-2"></i>{{__('products.add-to-cart')}}</button>
                        </form>
                    @endif
                </aside>
            </div>
        </section>
        @include($specification_view)
    </div>


@endsection



@section('often-bought')
<ul class="hidden md:grid md:grid-cols-2 lg:grid-cols-4 gap-x-2 mt-10 mb-10">
    @foreach ($featured_products as $product) 
        @include('product-preview.productShowSection')
    @endforeach
</ul>
@endsection

@section('reviews')
    <h1 class="text-3xl">Reviews</h1>
    <ul class="flex overflow-x-auto mb-2">
        @forelse ($reviews as $review)
            <li class="mr-2">
                <section class="w-72 h-72 p-4 border border-dashed overflow-y-auto">
                    <header class="pb-1 border-dashed border-b">
                        <strong>&commat;{{$review->name}}</strong>
                    </header>
                    <small class="text-xs">
                        {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->created_at)->format('H:i | d.m.Y')}}
                    </small>
                    <body>
                        <section class="mt-4">
                            {{$review->text}}
                        </section>
                    </body>
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
                <input type="hidden" name="product_id" value="{{$showed_product->id}}">
                <textarea name="review_text" rows="5"class="w-full" placeholder="Add review"></textarea>
                <input type="hidden" name="product_slug" value="{{$showed_product->slug}}">
                <button type="submit" class="block w-full p-4 bg-green-400 text-white cursor-pointer">Add review</button>
            </form>
        </section>
    @endauth
@endsection