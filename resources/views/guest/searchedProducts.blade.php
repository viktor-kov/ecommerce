@extends('layouts.products-master')

@section('content')
    <h1 class="text-2xl mt-2 mb-2">{{__('other.searched-for')}}<span>"{{request()->input('search')}}"</span></h1>
    <ul class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-2">
        @forelse ($products as $product)
            @include('product-preview.productShowSection')
        @empty
            <li class="text-xl">{{__('other.no-search')}}<span>"{{request()->input('search')}}"</span></li>
        @endforelse
    </ul>
@endsection
