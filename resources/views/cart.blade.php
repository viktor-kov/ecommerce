@extends('layouts.master')


@section('content')
<section class="min-h-screen">
    @if (Cart::count() > 0)
        <ul class="mt-2 w-3/4">
            @foreach (Cart::content() as $product)
                <li class="mb-2 flex border-b border-black">
                    <section class="grid grid-cols-4 justify-around p-2 text-xl w-full">
                        <a href="{{route('product.show', $product->options->category)}}/{{$product->id}}">
                            <img src="{{asset('img/products/'.$product->id.'.jpeg')}}"  alt="{{$product->name}}" class="h-24 w-auto">
                        </a>
                        <h1 class="grid items-center"><a href="{{route('product.show', $product->options->category)}}/{{$product->id}}">{{$product->name}}</a></h1>
                        <form action="{{route('cart.update', $product->rowId)}}" class="place-self-center" method="post">
                            @csrf
                            @method('PUT')
                            <select name="qty" id="qty" onchange="this.form.submit()">
                                <option value="1" {{($product->qty == 1) ? 'selected' : ''}}>1</option>
                                <option value="2" {{($product->qty == 2) ? 'selected' : ''}}>2</option>
                                <option value="3" {{($product->qty == 3) ? 'selected' : ''}}>3</option>
                                <option value="4" {{($product->qty == 4) ? 'selected' : ''}}>4</option>
                                <option value="5" {{($product->qty == 5) ? 'selected' : ''}}>5</option>
                            </select>
                        </form>
                        <h2 class="place-self-center">{{$product->price}}€</h2>
                    </section>
                    <form action="{{route('cart.destroy', $product->rowId)}}" method="post" class="place-self-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xl text-gray-500"><i class="fas fa-trash"></i></button>
                    </form>
                </li>
            @endforeach
        </ul>
        @if (Cart::subtotal() > 0)
            <section class="w-3/4">
                <p class="flex justify-end">{{__('checkout.total-sum')}} {{Cart::subtotal()}}€</p>
                <section class="grid grid-cols-2 gap-1 justify-center w-full">
                    <a href="{{route('home.index')}}" class="p-4 border border-black mt-4 inline-block ">{{__('checkout.back-to-categories')}}</a>
                    <form action="{{route('checkout.index')}}" method="get">
                        @csrf
                        <input type="submit" value="{{__('checkout.checkout')}}" class="p-4 w-full border border-black mt-4 inline-block bg-green-400 cursor-pointer">
                </section>
            </section>
            @endif
            @else 
            <section class="grid grid-rows-1 justify-center">
                <h1 class="p-10 back text-3xl">{{__('checkout.empty-cart')}}</h1>
                <a href="{{route('home.index')}}" class="p-4 border border-black text-center">{{__('checkout.start-shopping')}}</a>
            </section>
    @endif
    <section class="mt-20">
        <h1 class="hidden md:block text-2xl">{{__('checkout.featured-products')}}</h1>
        <ul class="hidden md:grid md:grid-cols-2 lg:grid-cols-4 gap-x-2 mt-10">
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
    </section>
</section>

@endsection
