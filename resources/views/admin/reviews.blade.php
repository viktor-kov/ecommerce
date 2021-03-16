@extends('layouts.adminlayout')

@section('stats')

<ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 p-4">
    @forelse ($reviews as $review)
        <li class="mr-2">
            <section class="w-72 h-72 p-4 border border-dashed overflow-y-auto">
                <header class="flex justify-between">
                    <strong>
                        <a href="{{route('allusers', ['id' => $review->user_id])}}">&commat;{{$review->name}}</a>
                    </strong>
                    <form action="{{route('review.destroy', ['id' => $review->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xl"><i class="fas fa-trash"></i></button>
                    </form>
                </header>
                <body>{{$review->text}}</body>
            </section>
        </li>
    @empty
    <li class="text-3xl">No reviews</li>
    @endforelse
</ul>

<section class="mt-4">
    {{ $reviews->links() }}
</section>
    
@endsection