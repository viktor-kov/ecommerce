@extends('layouts.adminlayout')

@section('stats')

<ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 p-4">
    @forelse ($reviews as $review)
        <li class="mr-2">
            <section class="h-72 p-4 border border-dashed relative">
                <header><strong><a href="{{route('allusers', ['id' => $review->user_id])}}">&commat;{{$review->name}}</a></strong></header>
                <body>{{$review->text}}</body>
                <footer class="absolute bottom-0 left-0 right-0 text-center">
                    <form action="{{route('review.destroy', ['id' => $review->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-3xl"><i class="fas fa-trash"></i></button>
                    </form>
                </footer>
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