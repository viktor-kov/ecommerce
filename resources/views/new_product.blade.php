@extends('layouts.adminlayout')


@section('stats')
    <section>
        <h1 class="text-center text-3xl">Pridať produkt</h1>    
        <section class="bg-gray-200 p-4">
            <form action="./addproduct" method="post" enctype="multipart/form-data">
                @csrf
                <p class="flex justify-between">Názov
                    <input type="text" name="product_name" id="" class="w-3/4">
                </p>
                <p class="flex justify-between mt-1">Popis
                    <textarea name="product_description" rows="10" class="w-3/4"></textarea>
                </p>
                <p class="flex justify-between mt-1">Obrázok
                    <input type="file" name="product_image" id="" class="w-3/4 bg-red-500">
                </p>
                <p class="flex justify-between mt-1">Cena
                    <input type="text" name="product_price" id="" class="w-3/4">
                </p>
                <p class="flex justify-between mt-1">Kategória
                    <select name="product_category" id="role" class="w-3/4">
                        <option value="" selected disabled hidden>Vyber kategóriu</option>
                        <option value="1">Pamäť RAM</option>
                        <option value="2">Procesory</option>
                        <option value="3">Základné dosky</option>
                        <option value="4">Počítačové skrine</option>
                        <option value="5">Počítačové zdroje</option>
                        <option value="6">Disky a SSD</option>
                        <option value="7">Chladenie</option>
                        <option value="8">Grafické karty</option>               
                    </select>
                </p>
                <p class="mt-2">
                    <input type="submit" value="Pridať produkt" class="p-4 bg-green-400 text-white w-full cursor-pointer">
                </p>
            </form>
        </section>
   </section>

@endsection


