@extends('layouts.adminlayout')


@section('stats')
<section class="w-full h-24 mt-16">
    <ul class="flex justify-around text-2xl">
        <li class="pr-4">
            <section>
                <aside @if($invoice->status == 400) class="text-green-400 text-center" @else class="text-red-500 text-center" @endif>
                    <p>
                        {{__('order.packed')}}
                    </p>
                    <i class="far fa-check-circle"></i>
                </aside>
            </section>
        </li>
        <li class="pr-4">
            <section>
                <aside @if($invoice->status == 400) class="text-green-400 text-center" @else class="text-red-500 text-center" @endif>
                    <p>
                        {{__('order.shipped')}}
                    </p>
                    <i class="far fa-check-circle"></i>
                </aside>
            </section>
        </li>
        <li>
            <section>
                <aside @if($invoice->status == 400) class="text-green-400 text-center" @else class="text-red-500 text-center" @endif>
                    <p>
                        {{__('order.is-home')}}
                    </p>
                    <i class="far fa-check-circle"></i>
                </aside>
            </section>
        </li>
    </ul>
</section>
@if ($invoice->active == 0)
<section class="w-full p-2 bg-green-400 text-white text-center">
    <p>{{__('order.completed')}}</p>
</section>
@endif
<section class="bg-gray-300  p-2 border border-black mb-1 flex justify-end mt-4">
    <a href="{{route('invoice.show', ['id' => $invoice->invoice_name])}}" class="w-full" target="_blank">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoice->created_at)->format('H:i | d.m.Y') }}</a>
</section>
<table class="w-full mt-4">
    <tr class="text-left bg-green-300 text-xl">
        <th class="p-2">
            {{__('products.product-name')}}
        </th>
        <th class="p-2">
            {{__('products.product-qty')}}
        </th>
        <th class="p-2">
            {{__('products.product-price')}}
        </th>
    </tr>
    @foreach ($order as $product)
        <tr class="bg-gray-100 mt-2">
            <td class="p-2">
                {{$product->product_name}}
            </td>
            <td class="p-2">
                {{$product->quantity}}
            </td>
            <td class="p-2">
                {{$product->price}}
            </td>
        </tr>
    @endforeach
</table>
<table class="w-full mt-2 mb-2">
    <tr>
        <td class="border border-black w-1/4 p-2">{{__('order.total-sum')}}</td>
        <td class="border border-black w-3/4 p-2 text-right">{{$total_sum}}€</td>
    </tr>
</table>
@endsection