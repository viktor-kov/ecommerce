<section class="p-2">
    <h1 class="text-3xl">{{__('review.reviews')}}</h1>
    <ul class="flex overflow-x-auto mb-2">
        @forelse ($reviews as $review)
            <li class="mr-2">
                <section class="w-72 h-72 p-4 border border-dashed overflow-y-auto">
                    <header class="pb-1 border-dashed border-b">
                        <strong>&commat;{{$review->name}}</strong>
                    </header>
                    <small class="text-xs">
                        {{$review->created_at->diffForHumans()}}
                    </small>
                    <body>
                        <section class="mt-4">
                            {{$review->text}}
                        </section>
                    </body>
                </section>
            </li>
        @empty
            <li class="text-3xl">{{__('review.no-review')}}</li>
        @endforelse
    </ul>
    @auth
        <section>
            @if (session()->has('added-review'))
                <section class="w-full bg-green-400 mb-2">
                    <p class="text-center text-white p-2">{{session()->get('added-review')}}</p>
                </section>
            @endif
            <form wire:submit.prevent="addReview">
                <input type="hidden" name="product_id" value="{{$showed_product->id}}">
                <textarea name="review_text" rows="5" class="w-full p-2 border border-dashed" placeholder="{{__('review.your-review')}}" wire:model.defer="review_text"></textarea>
                @error('review_text') <span class="text-red-500">{{ $message }}</span> @enderror
                <button type="submit" class="block w-full p-4 bg-green-400 text-white cursor-pointer">{{__('review.add-review')}}</button>
            </form>
        </section>
    @endauth
    @guest
        <section>
            <p class="text-3xl p-2 border bg-gray-200 text-center">{{__('review.log-in-for-review')}}</p>
        </section>
    @endguest
</section>
