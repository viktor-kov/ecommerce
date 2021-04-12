<li class="product-container bg-white shadow-xl h-96 border w-90 p-2">
    <a href="{{route('product.show', ['id' => $product->category, 'slug' => $product->slug])}}">
        <div class="product-img">
            <img src="{{asset('img/'.$product->photo_path)}}" alt="{{$product->name}}" class="h-64 mx-auto my-auto transform scale-75">
        </div>
        <div class="product-information">
            <h2 class="h-10 text-lg font-semibold">
                <a href="{{route('product.show', ['id' => $product->category, 'slug' => $product->slug])}}">{{$product->name}}</a>
            </h2>
            <div class="product-price items-center mt-4">
                @if ($product->amount->product_amount > 0)
                    <form action="{{route('cart.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="submit" class="p-4 bg-green-400 text-white cursor-pointer block w-full hover:bg-green-500"><i class="fas fa-shopping-basket mr-2"></i>{{$product->price}}€</button>
                    </form>
                @else
                    <p class="p-4 bg-red-400 text-white w-full block text-center">{{__('products.unavailable-short')}}</p>
                @endif
            </div>
        </div>
    </a>
</li>