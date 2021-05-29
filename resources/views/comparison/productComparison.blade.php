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
    <div class="shadow-xl grid grid-cols-2">
        @if(session('comparison.products.product_1'))
            <section>
                <div class="p-8">
                    <div>
                        <img src="{{asset('img/' . $comparedProducts['productOne']['product']->photo_path)}}" alt="{{$comparedProducts['productOne']['product']->name}}" class="w-72 h-72 mx-auto">
                        <h1 class="text-xl mt-4">
                            <a href="{{route('product.show', ['id' => $comparedProducts['productOne']['product']->category, 'slug' => $comparedProducts['productOne']['product']->slug])}}">{{$comparedProducts['productOne']['product']->name}}</a>
                        </h1>
                    </div>
                    <div class="mt-2">
                        <form action="{{route('comparison.delete', ['product_field' => 'product_1'])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-4 bg-red-400 cursor-pointer text-white hover:bg-red-500 w-full block"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                </div>
                @include($comparedProducts['productOne']['specificationsView'], ['product_specifications' => $comparedProducts['productOne']['specifications']])
            </section>
        @else
            <section class="min-h-screen text-center">
                <h1 class="p-8 text-3xl">{{__('comparison.choose-from-products')}}</h1>
                <a href="{{route('home.index')}}" class="p-4 border border-black text-center">{{__('comparison.choose-products')}}</a>
            </section>
        @endif
        @if(session('comparison.products.product_2'))
            <section>
                <div class="p-8">
                    <div>
                        <img src="{{asset('img/' . $comparedProducts['productTwo']['product']->photo_path)}}" alt="{{$comparedProducts['productTwo']['product']->name}}" class="w-72 h-72 mx-auto">
                        <h1 class="text-xl mt-4">
                            <a href="{{route('product.show', ['id' => $comparedProducts['productTwo']['product']->category, 'slug' => $comparedProducts['productTwo']['product']->slug])}}">{{$comparedProducts['productTwo']['product']->name}}</a>
                        </h1>
                    </div>
                    <div class="mt-2">
                        <form action="{{route('comparison.delete', ['product_field' => 'product_2'])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-4 bg-red-400 cursor-pointer text-white hover:bg-red-500 w-full block"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                </div>
                @include($comparedProducts['productTwo']['specificationsView'], ['product_specifications' => $comparedProducts['productTwo']['specifications']])
            </section>
            @else
                <section class="min-h-screen text-center">
                    <h1 class="p-8 text-3xl">{{__('comparison.choose-from-products')}}</h1>
                    <a href="{{route('home.index')}}" class="p-4 border border-black text-center">{{__('comparison.choose-products')}}</a>
                </section>
            @endif
    </div>
@endsection
