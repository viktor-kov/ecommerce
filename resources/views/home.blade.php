@extends('layouts.master')

@section('hero')
    <img src="img/banner.jpg" alt="" class="w-full">
@endsection

@section('content')

    <nav class="mt-10">
        <ul class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            @foreach ($categories as $category)
                <li class="bg-gray-200 rounded-lg cursor-pointer block h-auto">
                    <a href="{{route('product.show', ['id' => $category->id])}}">
                        <img src="{{asset('img/categories/'.$category->category_photo)}}" alt="" class="mt-4 w-8/12 m-auto ">
                        <h2 class="mt-4 text-2xl">{{$category->category_name}}</h2>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endsection
