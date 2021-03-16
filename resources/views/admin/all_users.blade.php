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
<ul class="m-4">
    @foreach ($users as $user)
        @if ($user->id != auth()->user()->id)
            <li class="w-1/4 mt-1 bg-green-300">
                <a href="allusers/{{$user->id}}">
                    <section class="flex justify-between p-4">
                        <h1>{{$user->email}}</h1>
                        <small>{{$user->created_at}}</small>
                    </section>
                </a>
            </li>
        @endif
    @endforeach
</ul>
@endsection