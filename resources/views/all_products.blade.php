@extends('layouts.products-master')

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
    <ul class="product-section m-auto grid justify-items-center xl:grid-cols-4 gap-4 md:grid-cols-2 sm:grid-cols-1">
        @foreach ($products as $product)
            <li class="product-container w-80 flex flex-col bg-gray-200 shadow-xl h-100">
                <a href="edit/{{$product->id}}">
                    <div class="product-img">
                        <img src="{{asset('img/'.$product->photo_path)}}" alt="{{$product->name}}" class="h-72 w-80">
                    </div>
                    <div class="product-information p-2">
                        <h2 class="product-title font-semibold"><a href="edit/{{$product->id}}">{{$product->name}}</a></h2>
                        <div class="product-price flex justify-between items-center mt-4">
                            <span class="text-red-600 font-semibold text-lg">{{$product->price}}€</span>
                            <a href="edit/{{$product->id}}" class="text-white bg-red-600 p-1 md:break-words">{{__('admin.edit-product')}}</a>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
