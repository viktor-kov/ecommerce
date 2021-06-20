@extends('layouts.adminlayout')

@section('stats')

<ul class="p-1">
    @forelse ($reviews as $review)
        <li class="border border-black mt-1">
            <section class="p-2">
                <header class="flex justify-between">
                   <section>
                       <strong>
                           <a href="{{route('allusers', ['id' => $review->user_id])}}">&commat;{{$review->name}}</a>
                       </strong>
                       <small>
                           {{$review->created_at->diffForHumans()}}
                       </small>
                   </section>
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
