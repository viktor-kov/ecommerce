@extends('layouts.adminlayout')

@section('extra-js')
    <script>
        function show(selected) {
            let product_category = selected.value;
            let url = 'http://localhost/www/ecommerce/public/specifications/' + product_category;
            
            $("#parameters").load(url);
        }
    </script>
@endsection


@section('stats')
    <section>
        <h1 class="text-center text-3xl">{{__('admin.add-product')}}</h1>    
        <section class="bg-gray-200 p-4">
            <form action="./addproduct" method="post" enctype="multipart/form-data">
                @csrf
                <p class="flex justify-between">
                    {{__('admin.product-name')}} <input type="text" name="product_name" id="product_name" class="w-3/4">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-desc')}} <textarea name="product_description" id="product_desc" rows="10" class="w-3/4"></textarea>
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-img')}} <input type="file" name="product_image" id="product_img" class="w-3/4 bg-red-500">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-price')}} <input type="text" name="product_price" id="product_price" class="w-3/4">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-category')}}
                    <select name="product_category" id="role" class="w-3/4" onchange="show(this)">
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
                <div id="parameters"></div>
                <p class="mt-2">
                    <input type="submit" value="{{__('admin.add-product')}}" class="p-4 bg-green-400 text-white w-full cursor-pointer">
                </p>
            </form>
        </section>
   </section>

@endsection


