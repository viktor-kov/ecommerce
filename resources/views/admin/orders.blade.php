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
<section>
    <ul class="grid grid-cols-1 md:grid-cols-4 text-center text-xl p-1">
        <li class="mb-1 bg-green-400 p-2">
            @if (request()->segment(count(request()->segments())) == "show")
                <strong><a href="{{route('orders')}}">{{__('order.order-active')}}</a></strong>
            @else
                <a href="{{route('orders')}}">{{__('order.order-active')}}</a>
            @endif
        </li>
        <li class="mb-1 bg-green-400 p-2">
            @if (request()->segment(count(request()->segments())) == 200)
                <strong><a href="{{route('orders.category', ['category' => 200])}}">{{__('order.packed')}}</a></strong>
            @else
                <a href="{{route('orders.category', ['category' => 200])}}">{{__('order.packed')}}</a>
            @endif
        </li>
        <li class="mb-1 bg-green-400 p-2">
            @if (request()->segment(count(request()->segments())) == 300)
                <strong><a href="{{route('orders.category', ['category' => 300])}}">{{__('order.shipped')}}</a></strong>
            @else
                <a href="{{route('orders.category', ['category' => 300])}}">{{__('order.shipped')}}</a>
            @endif
        </li>
        <li class="mb-1 bg-green-400 p-2">
            @if (request()->segment(count(request()->segments())) == 400)
                <strong><a href="{{route('orders.category', ['category' => 400])}}">{{__('order.is-home')}}</a></strong>
            @else
                <a href="{{route('orders.category', ['category' => 400])}}">{{__('order.is-home')}}</a>
            @endif
        </li>
    </ul>
</section>
<h1 class="text-center text-3xl">{{__('admin.orders')}}</h1>
<ul id="order-list">
    @foreach ($orders as $order)
    <li class="grid grid-cols-1 md:grid-cols-3  p-2 border border-black mb-1  bg-gray-300">
        <p class="flex justify-center">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('H:i | d.m.Y') }}</p>
        <p class="flex justify-center">
            {{ $order->invoice_name}}
        </p>
        <p class="flex justify-center md:justify-end">
            <a href="{{route('order.show', ['id' => $order->id])}}">{{__('admin.show-order')}}</a>
        </p>
    </li>
    @endforeach
</ul>

@endsection
