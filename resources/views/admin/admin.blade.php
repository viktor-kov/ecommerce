@extends('layouts.adminlayout')

@section('navigation')
<nav>
    <ul class="mt-1 grid grid-cols-1 sm:grid-cols-3 gap-x-1 gap-y-2">
        <li class="bg-green-500 text-white text-center"><a class="block p-4" href="{{route('newproduct')}}">{{__('admin.add-product')}}</a></li>
        <li class="bg-orange-500 text-white text-center"><a class="block p-4" href="{{route('allusers')}}">{{__('admin.users')}}</a></li>
        <li class="bg-blue-500 text-white text-center disabled"><a class="block p-4" href="">{{__('admin.warehouse')}}</a></li>
    </ul>
</nav>
@endsection

@section('stats')

<ul class="mt-1 grid grid-cols-1 sm:grid-cols-3 gap-x-1 gap-y-2 text-center">
    <li class="p-4 bg-gray-400">{{__('admin.users')}}: {{$users}}</li>
    <li class="bg-gray-400"><a href="{{route('allproducts')}}" class="p-4 block">{{__('admin.products')}} {{$products}}</a></li>
    <li class="p-4 bg-gray-400">{{__('admin.newsletter')}} {{$subscriptions}}</li>
    <li class="p-4 bg-yellow-300 col-span-full"><a href="{{route('orders')}}" class="block">{{__('admin.orders')}}</a></li>
    <li class="p-4 bg-pink-300 col-span-full"><a href="{{route('review.index')}}">{{__('admin.see-reviews')}}</a></li>
</ul>
    
@endsection