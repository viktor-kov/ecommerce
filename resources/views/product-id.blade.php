@extends('layouts.master')


@section('content')
    <div class="main-container shadow-xl">
        <section class="grid grid-cols-2 mt-4">
            <img src="../../img/grafika.jpg" alt="" class="w-200">
            <div class="product-informations m-5">
                <h1 class="text-4xl">{{$product->name}}</h1>
                <p class="mt-4 h-64 overflow-y-auto p-2 border-l bg-gray-100 shadow-xl">{{$product->text}}</p>
                <aside class="pricin pt-6 pb-6">
                    <p class="flex justify-between text-gray-400">Cena s DPH <span>{{$product->price}}€</span></p>
                    <p class="flex justify-between text-gray-400">Cena bez DPH <span>{{$product->price}}€</span></p>
                </aside>
                <aside class="buy-buttons flex justify-evenly">
                    <a href="" class="w-2/5 p-4 text-center bg-green-400 text-white">Kúpiť</a>
                    <a href="" class="w-2/5 p-4 text-center bg-black text-white">Kúpiť urýchlene</a>
                </aside>
            </div>
        </section>
    </div>

@endsection


@section('often-bought')
    <p>casto nakupovane</p>
@endsection
