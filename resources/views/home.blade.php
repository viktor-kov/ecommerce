@extends('layouts.master')

@section('hero')
    <img src="img/banner.jpg" alt="" class="w-full">
@endsection

@section('content')
    <nav class="mt-10">
        <ul class="grid grid-cols-4 gap-8 text-center md:text-sm sm:text-xs">
            <li class="w-auto bg-gray-200 rounded-lg cursor-pointer block">
                <a href="/www/ecommerce/public/products/1">
                    <img src="img/ram-memory.png" alt="" class="mt-4 w-8/12 m-auto ">
                    <h2 class="mt-4 lg:text-2xl md:text-base sm:text-sm">Pamäte RAM</h2>
                </a>
            </li>
            <li class="w-auto bg-gray-200 rounded-lg cursor-pointer block">
                <a href="/www/ecommerce/public/products/2">
                    <img src="img/processor.png" alt="" class="mt-4 w-8/12 m-auto ">
                    <h2 class="mt-4 lg:text-2xl md:text-base sm:text-sm">Procesory</h2>
                </a>
            </li>
            <li class="w-auto bg-gray-200 rounded-lg cursor-pointer block">
                <a href="/www/ecommerce/public/products/3">
                    <img src="img/motherboard.png" alt="" class="mt-4 w-8/12 m-auto ">
                    <h2 class="mt-4 lg:text-2xl md:text-base sm:text-sm">Základné dosky</h2>
                </a>
            </li>
            <li class="w-auto bg-gray-200 rounded-lg cursor-pointer block">
                <a href="/www/ecommerce/public/products/4">
                    <img src="img/desktop.png" alt="" class="mt-4 w-8/12 m-auto ">
                    <h2 class="mt-4 lg:text-2xl md:text-base sm:text-sm">Počítačové skrine</h2>
                </a>
            </li>
            <li class="w-auto bg-gray-200 rounded-lg cursor-pointer block">
                <a href="/www/ecommerce/public/products/5">
                    <img src="img/supply.png" alt="" class="mt-4 w-8/12 m-auto ">
                    <h2 class="mt-4 lg:text-2xl md:text-base sm:text-sm">Počítačové zdroje</h2>
                </a>
            </li>
            <li class="w-auto bg-gray-200 rounded-lg cursor-pointer block">
                <a href="/www/ecommerce/public/products/6">
                    <img src="img/hard-drive.png" alt="" class="mt-4 w-8/12 m-auto ">
                    <h2 class="mt-4 lg:text-2xl md:text-base sm:text-sm">Disky a SSD</h2>
                </a>
            </li>
            <li class="w-auto bg-gray-200 rounded-lg cursor-pointer block">
                <a href="/www/ecommerce/public/products/7">
                    <img src="img/cooling-fan.png" alt="" class="mt-4 w-8/12 m-auto ">
                    <h2 class="mt-4 lg:text-2xl md:text-base sm:text-sm">Chladenie</h2>
                </a>
            </li>
            <li class="w-auto bg-gray-200 rounded-lg cursor-pointer block">
                <a href="/www/ecommerce/public/products/8">
                    <img src="img/graphic-card.png" alt="" class="mt-4 w-8/12 m-auto ">
                    <h2 class="mt-4 lg:text-2xl md:text-base sm:text-sm">Grafické karty</h2>
                </a>
            </li>
        </ul>
    </nav>
@endsection
