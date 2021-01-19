@extends('layouts.master')


@section('content')
<section class="h-screen w-3/4">
    @if (Cart::count() > 0)
    <h1>Košík</h1>
    <ul class="mt-2">
        @foreach (Cart::content() as $product)
            <li class="mb-2 flex border-b border-black">
                <section class="grid grid-cols-4 justify-around p-2 text-xl w-full">
                    <a href="{{route('product.show', $product->options->category)}}/{{$product->id}}">
                        <img src="{{asset('img/products/'.$product->id.'.jpeg')}}"  alt="{{$product->name}}" class="h-24 w-auto">
                    </a>
                    <h1 class="place-self-center"><a href="{{route('product.show', $product->options->category)}}/{{$product->id}}">{{$product->name}}</a></h1>
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
        <section class="flex justify-between">
            <a href="{{route('home.index')}}" class="p-4 border border-black mt-4 inline-block">Späť na kategórie!</a>
            <p>Total: {{Cart::subtotal()}}€</p>
        </section>
    @endif
    @else 
        <section>
            <h1 class="p-10 back">Váš košík je prázdny</h1>
            <a href="{{route('home.index')}}" class="p-4 border border-black">Začnite nakupovať teraz!</a>
        </section>
    @endif
</section>


@endsection
