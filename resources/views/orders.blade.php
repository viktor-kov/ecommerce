@extends('layouts.adminlayout')

@section('stats')

<h1 class="text-center text-3xl">{{__('admin.orders')}}</h1>
<ul>
    @foreach ($orders as $order)
    <li class="bg-gray-300  p-2 border border-black mb-1">
        <p>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('H:i | d.m.Y') }}</p>
        <p>
            <a href="{{route('orderstatus.update', ['id' => $order->id])}}">Update status</a>
        </p>
    </li>
    @endforeach
</ul>
@endsection