@extends('layouts.adminlayout')


@section('stats')
    <section>
        <h1 class="text-center text-3xl">{{__('admin.edit-product')}}</h1>    
        <section class="bg-gray-200 p-4">
            <form action="../editproduct/{{$product->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <p class="flex justify-between">
                    {{__('admin.product-name')}} <input type="text" name="product_name" id="" class="w-3/4" value="{{$product->name}}">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-desc')}} <textarea name="product_description" rows="10" class="w-3/4">{{$product->text}}</textarea>
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-img')}} <input type="file" name="product_image" id="" class="w-3/4 bg-red-500">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-price')}} <input type="text" name="product_price" id="" class="w-3/4" value="{{$product->price}}"">
                </p>
                <p>
                    <input type="hidden" name="product_photo_path" value="{{$product->photo_path}}">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-category')}}
                    <select name="product_category" id="role" class="w-3/4">
                        <option value="1" {{($product->category == 1) ? 'selected' : ''}}>Pamäť RAM</option>
                        <option value="2" {{($product->category == 2) ? 'selected' : ''}}>Procesory</option>
                        <option value="3" {{($product->category == 3) ? 'selected' : ''}}>Základné dosky</option>
                        <option value="4" {{($product->category == 4) ? 'selected' : ''}}>Počítačové skrine</option>
                        <option value="5" {{($product->category == 5) ? 'selected' : ''}}>Počítačové zdroje</option>
                        <option value="6" {{($product->category == 6) ? 'selected' : ''}}>Disky a SSD</option>
                        <option value="7" {{($product->category == 7) ? 'selected' : ''}}>Chladenie</option>
                        <option value="8" {{($product->category == 8) ? 'selected' : ''}}>Grafické karty</option>               
                    </select>
                </p>
                <p class="mt-2">
                    <input type="submit" value="{{__('admin.edit-product')}}" class="p-4 bg-green-400 text-white w-full cursor-pointer">
                </p>
            </form>
            <form action="../delete/{{$product->id}}" method="post">
                @csrf
                <input type="hidden" name="product_photo_path" value="{{$product->photo_path}}">
                <input type="submit" value="{{__('admin.del-product')}}" class="p-4 bg-red-600 text-white w-full cursor-pointer mt-4">
            </form>
            <section class="p-4">
                <img src="{{asset('img/'.$product->photo_path)}}" alt="" class="mx-auto w-1/2">
            </section>
        </section>
   </section>

@endsection


