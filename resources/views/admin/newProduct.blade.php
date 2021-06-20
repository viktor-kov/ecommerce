@extends('layouts.adminlayout')

@section('extra-js')
    <script>
        function show(selected) {
            let product_category = selected.value;
            let url = '{{env('APP_URL')}}specifications/' + product_category;

            $("#parameters").load(url);
        }

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
        <h1 class="text-center text-3xl">{{__('admin.add-product')}}</h1>
        <section class="bg-gray-200 p-4">
            <form action="{{route('addproduct')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="flex justify-between">
                    {{__('admin.product-name')}} <input type="text" name="product_name" id="product_name" class="w-3/4 p-1" value="{{old('product_name')}}">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-desc')}} <textarea name="product_description" id="product_desc" rows="10" class="w-3/4 p-1">{{old('product_description')}}</textarea>
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-img')}} <input type="file" name="product_image" id="product_img" onchange="loadImage(event)" class="w-3/4 bg-red-500">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-price')}} <input type="text" name="product_price" id="product_price" class="w-3/4 p-1" value="{{old('product_price')}}">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.amount')}} <input type="text" name="product_amount" id="product_amount" class="w-3/4 p-1" value="{{old('product_amount')}}">
                </p>
                <p class="flex justify-between mt-1">
                    {{__('admin.product-category')}}
                    <select name="product_category" id="role" class="w-3/4 p-1" onchange="show(this)">
                        <option value="" selected disabled hidden>Vyber kategóriu</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{__('categories.'.$category->category_name)}}</option>
                            @endforeach
                    </select>
                </p>
                <div id="parameters" class="mt-8"></div>
                <p class="mt-2">
                    <input type="submit" value="{{__('admin.add-product')}}" class="p-4 bg-green-400 text-white w-full cursor-pointer">
                </p>
            </form>
            <img id="imagePreview" class="mx-auto w-1/2">
        </section>
   </section>

@endsection


