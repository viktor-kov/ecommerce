@extends('layouts.master')


@section('content')
<section class="grid grid-rows-1 items-center place-content-center h-screen w-full">
    <section class="place-self-center">
        <h1 class="p-4 text-3xl">{{__('other.thank-you')}}</h1>
        <a href="{{route('home.index')}}" class="grid justify-center p-4 border border-black text-center ">{{__('checkout.back-to-categories')}}</a>
    </section>
</section>
@endsection
