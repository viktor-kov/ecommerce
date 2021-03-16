@extends('layouts.products-master')

@section('category-name')
    @if ($products->isEmpty())
        <h1 class="text-4xl">{{__('products.no-products')}}<span class="font-bold">{{$category_name->category_name}}</span></h1>
    @else
        <h1 class="text-4xl"><span class="font-bold">{{$category_name->category_name}}</span></h1>
    @endif
@endsection

@section('content')
@if(!$products->isEmpty())
    <ul class="grid sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
        @foreach ($products as $product)
            @include('product-preview.product-show-section')
        @endforeach
    </ul>
@endif
@endsection
