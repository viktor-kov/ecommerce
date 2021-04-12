<div>
    <section class="grid sm:grid-cols-1 md:grid-cols-3 justify-around p-2">
        <img src="{{asset('img/'.$single_product->product->photo_path)}}" alt="{{$single_product->product->name}}" class="w-20 h-20">
        <h1 class="text-xl grid items-center">
            <a href="{{route('product.show', ['id' => $single_product->product->category, 'slug' => $single_product->product->slug])}}">
                {{$single_product->product->name}}
            </a>
        </h1>
        <div class="flex justify-end">
            <form wire:submit.prevent="updateAmount" action="#" method="POST" class="w-full md:w-3/4">
                @csrf
                @method('PUT')
                <input type="number" name="product_amount" id="product_amount" class="border border-black outline-none w-full p-1" wire:model="product_amount_update">
                <button type="submit" class="p-2 bg-green-400 w-full mt-1">Update</button>
            </form>
        </div>
        @if (session()->has('success'))
            <div class="w-full bg-green-400 col-span-full mt-1 mb-1">
                <p class="text-center p-2">{{session()->get('success')}}</p>
            </div>
        @endif
    </section>
</div>
