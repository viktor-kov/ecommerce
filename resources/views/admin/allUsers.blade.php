@extends('layouts.adminlayout')

@section('messages')
    @if (session()->get('success'))
        @include('messages.success')
    @endif

    @if (session()->get('error'))
        @include('messages.error')
    @endif
@endsection

@section('extra-js')

    <script type="text/javascript">
        $(document).ready( function() {
            $('#message').delay(5000).fadeOut();
        });
    </script>

@endsection


@section('stats')
<section class="p-2">
    <ul class="w-full">
        @foreach ($users as $user)
            <li class="w-full mt-1 bg-gray-200 border border-black">
                <a href="{{route('allusers', ['id' => $user->id])}}">
                    <section class="flex justify-between p-4">
                        <h1>{{$user->email}}</h1>
                        <small>{{$user->created_at}}</small>
                    </section>
                </a>
            </li>
        @endforeach
    </ul>
    <p class="mt-8">
        {{$users->links()}}
    </p>
</section>
@endsection
