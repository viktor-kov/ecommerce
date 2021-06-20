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

@section('hero')
    <img src="{{asset('img/wellcome-img.jpg')}}" alt="" class="w-full">
@endsection

@section('content')

    <nav class="mt-10 mb-10 lg:mt-44 lg:mb-44 xl:mt-10 xl:mb-10">
        <ul class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center pl-2 pr-2">
            @foreach ($categories as $category)
                <li class="bg-gray-200 rounded-lg cursor-pointer block h-auto">
                    <a href="{{route('product.show', ['category_id' => $category->category_name])}}">
                        <img src="{{asset('img/categories/'.$category->category_photo)}}" alt="" class="mt-4 w-8/12 m-auto ">
                        <h2 class="mt-4 text-2xl">{{__('categories.'.$category->category_name)}}</h2>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endsection
