@extends('layouts.adminlayout')

@section('extra-js')
    <script>

        let product_category_main = {{$product_category}};
        let product_id = {{$product_id}};

        //when the page load, than the specifications will display
        window.onload = function() {
            url = 'http://localhost/www/ecommerce/public/specifications/' + product_category_main + '/' + product_id;
            $("#parameters").load(url);
        } 

        //when we select the item from dropdown, than this function will execute and return the specifications field
        function show(selected) {
            let url;
            let product_category = selected.value;

            //if the main product category is the same as choosen product category from dropdown, than the specifications will display to edit
            if(product_category_main == product_category) {
                url = 'http://localhost/www/ecommerce/public/specifications/' + product_category + '/' + product_id;
            }
            else {
                url = 'http://localhost/www/ecommerce/public/specifications/' + product_category;
            }

            $("#parameters").load(url);
        }

        //show uploaded image
        function loadImage(event) {
            let output = document.getElementById('imagePreview');

            //create adress to the uploaded img and append in to the imagePreview img source
            output.src = URL.createObjectURL(event.target.files[0]);

            output.onload = function() {
                URL.revokeObjectURL(output.src); // free memory
            }
        };
    </script>
@endsection

@section('stats')
    <section>
        <h1 class="text-center text-3xl">{{__('admin.edit-product')}}</h1>    
        <section class="bg-gray-200 p-4">
            <form action="{{route('updateproduct', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <p class="flex justify-between">
                    {{__('admin.product-name')}} <input type="text" name="product_name" id="product_name" class="w-3/4" value="{{$product->name}}">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-desc')}} <textarea name="product_description" id="product_description" rows="10" class="w-3/4">{{$product->text}}</textarea>
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-img')}} <input type="file" name="product_image" id="" onchange="loadImage(event)" class="w-3/4 bg-red-500">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-price')}} <input type="text" name="product_price" id="" class="w-3/4" value="{{$product->price}}"">
                </p>
                <p>
                    <input type="hidden" name="product_photo_path" value="{{$product->photo_path}}">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-category')}}
                    <select name="product_category" id="role" class="w-3/4" onchange="show(this)">
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
                <div id="parameters" class="mt-8"></div>
                <p class="mt-2">
                    <input type="submit" value="{{__('admin.edit-product')}}" class="p-4 bg-green-400 text-white w-full cursor-pointer">
                </p>
            </form>
            <form action="{{route('deleteproduct', ['id' => $product->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="product_photo_path" value="{{$product->photo_path}}">
                <input type="submit" value="{{__('admin.del-product')}}" class="p-4 bg-red-600 text-white w-full cursor-pointer mt-4" onclick="return confirm('Si si istý?')">
            </form>
            <section class="p-4">
                <img src="{{asset('img/'.$product->photo_path)}}" id="imagePreview" alt="" class="mx-auto w-1/2">
            </section>
        </section>
   </section>

@endsection


