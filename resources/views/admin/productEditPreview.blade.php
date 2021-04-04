<li class="product-container bg-white shadow-xl h-96 border w-90 p-2">
    <a href="{{route('editproduct', ['id' => $product->id ])}}">
        <div class="product-img">
            <img src="{{asset('img/'.$product->photo_path)}}" alt="{{$product->name}}" class="h-64 mx-auto my-auto transform scale-75">
        </div>
        <div class="product-information">
            <h2 class="h-10 text-lg font-semibold">
                <a href="{{route('editproduct', ['id' => $product->id ])}}">{{$product->name}}</a>
            </h2>
            <div class="product-price items-center mt-4">
                <a href="{{route('editproduct', ['id' => $product->id ])}}" class="p-4 bg-red-400 text-white cursor-pointer block w-full hover:bg-red-500 text-center">{{__('admin.edit-product')}}</a>
            </div>
        </div>
    </a>
</li>