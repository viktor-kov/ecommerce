@extends('layouts.master')

@section('hero')
    <img src="img/banner.jpg" alt="" class="w-full">
@endsection

@section('content')

    <nav class="mt-10">
        <ul class="grid grid-cols-4 gap-8 text-center md:text-sm sm:text-xs">
            @foreach ($categories as $category)
                <li class="w-auto bg-gray-200 rounded-lg cursor-pointer block">
                    <a href="{{route('product.show', ['id' => $category->id])}}">
                        <img src="{{asset('img/categories/'.$category->category_photo)}}" alt="" class="mt-4 w-8/12 m-auto ">
                        <h2 class="mt-4 lg:text-2xl md:text-base sm:text-sm">{{$category->category_name}}</h2>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endsection
