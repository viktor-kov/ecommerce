@extends('layouts.adminlayout')

@section('navigation')
<nav>
    <ul class="mt-1 grid grid-cols-3 gap-x-1">
        <li class="bg-green-500 text-white text-center"><a class="block p-4" href="{{route('newproduct')}}">Pridať produkt</a></li>
        <li class="bg-orange-500 text-white text-center"><a class="block p-4" href="{{route('allusers')}}">Používatelia</a></li>
        <li class="bg-blue-500 text-white text-center"><a class="block p-4" href="">Sklad</a></li>
    </ul>
</nav>
@endsection

@section('stats')

<ul class="mt-4 grid grid-cols-3 gap-x-4 text-center">
    <li class="p-4 bg-gray-400">Používatelia: {{$users}}</li>
    <li class="bg-gray-400"><a href="{{route('allproducts')}}" class="p-4 block">Produkty: {{$products}}</a></li>
    <li class="p-4 bg-gray-400">Odoberatelia noviniek: {{$subscriptions}}</li>
</ul>
    
@endsection