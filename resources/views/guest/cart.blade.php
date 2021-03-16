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
<section class="min-h-screen p-2 sm:p-0">
    @if (Cart::count() > 0)
        <ul class="mt-2 w-full md:w-3/4">
            @foreach (Cart::content() as $product_in_cart)
                <li class="mb-2 flex border-b border-black">
                    <section class="grid grid-cols-4 justify-around p-2 text-xl w-full">
                        <a href="{{route('product.show', ['id' => $product_in_cart->options->category, 'slug' => $product_in_cart->id ])}}">
                            <img src="{{asset('img/'.$product_in_cart->options->product_photo)}}"  alt="{{$product_in_cart->name}}" class="h-24 w-auto">
                        </a>
                        <h1 class="grid items-center"><a href="{{route('product.show', ['id' => $product_in_cart->options->category, 'slug' => $product_in_cart->id ])}}">{{$product_in_cart->name}}</a></h1>
                        <form action="{{route('cart.update', ['row_id' => $product_in_cart->rowId])}}" class="place-self-center" method="post">
                            @csrf
                            @method('PUT')
                            <select name="qty" id="qty" onchange="this.form.submit()">
                                <option value="1" {{($product_in_cart->qty == 1) ? 'selected' : ''}}>1</option>
                                <option value="2" {{($product_in_cart->qty == 2) ? 'selected' : ''}}>2</option>
                                <option value="3" {{($product_in_cart->qty == 3) ? 'selected' : ''}}>3</option>
                                <option value="4" {{($product_in_cart->qty == 4) ? 'selected' : ''}}>4</option>
                                <option value="5" {{($product_in_cart->qty == 5) ? 'selected' : ''}}>5</option>
                            </select>
                        </form>
                        <h2 class="place-self-center">{{number_format($product_in_cart->price, 2)}}€</h2>
                    </section>
                    <form action="{{route('cart.destroy', ['row_id' => $product_in_cart->rowId])}}" method="post" class="place-self-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xl text-gray-500"><i class="fas fa-trash"></i></button>
                    </form>
                </li>
            @endforeach
        </ul>
        @if (Cart::subtotal() > 0)
            <section class="w-full md:w-3/4">
                <p class="flex justify-end">{{__('checkout.total-sum')}} {{Cart::subtotal()}}€</p>
                <section class="grid grid-cols-2 gap-1 justify-center w-full">
                    <a href="{{route('home.index')}}" class="p-4 border border-black mt-4 inline-block ">{{__('checkout.back-to-categories')}}</a>
                    <form action="{{route('checkout.index')}}" method="get">
                        @csrf
                        <input type="submit" value="{{__('checkout.checkout')}}" class="p-4 w-full border border-black mt-4 inline-block bg-green-400 cursor-pointer">
                    </form>
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
            @foreach ($featured_products as $product) 
                @include('product-preview.product-show-section')
            @endforeach
        </ul>
    </section>
</section>

@endsection
