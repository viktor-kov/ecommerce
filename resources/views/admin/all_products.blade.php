@extends('layouts.products-master')

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

@section('content')
    <ul class="grid sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
        @foreach ($products as $product)
            @include('admin.product-edit-preview')
        @endforeach
    </ul>
@endsection
