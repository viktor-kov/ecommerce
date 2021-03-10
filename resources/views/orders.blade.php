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

@section('extra-js')
<script>
    $(document).ready(function(){
        setInterval(function() {
            $( "#order-list" ).load("{{route('orders')}} #order-list li");
        }, 20000);

        $(document).ready( function() {
            $('#message').delay(5000).fadeOut();
        });
    });
</script>
@endsection

@section('stats')

<h1 class="text-center text-3xl">{{__('admin.orders')}}</h1>
<ul id="order-list">
    @foreach ($orders as $order)
    <li class="bg-gray-300  p-2 border border-black mb-1 flex justify-between">
        <p>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('H:i | d.m.Y') }}</p>
        <p>
            {{ $order->invoice_name}}
        </p>
        <p>
            <a href="{{route('order.show', ['id' => $order->id])}}">{{__('admin.show-order')}}</a>
        </p>
    </li>
    @endforeach
</ul>

@endsection