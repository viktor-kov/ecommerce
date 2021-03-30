@extends('layouts.adminlayout')


@section('stats')

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
<section class="w-full h-24 mt-16">
    <ul class="flex justify-center text-2xl">
        <li class="pr-4">
            <section>
                <form action="{{route('order-status.update', ['id' => $invoice->id, 'status' => '200'])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" @if($invoice->status == 200 || $invoice->status >= 300) class="text-green-400" @else class="text-red-500" @endif>
                        <p>
                            Zabalené
                        </p>
                        <i class="far fa-check-circle"></i>
                    </button>
                </form>
            </section>
        </li>
        <li class="pr-4">
            <section>
                <form action="{{route('order-status.update', ['id' => $invoice->id, 'status' => '300'])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" @if($invoice->status == 300 || $invoice->status >= 400) class="text-green-400" @else class="text-red-500" @endif>
                        <p>
                            Odoslané
                        </p>
                        <i class="far fa-check-circle"></i>
                    </button>
                </form>
            </section>
        </li>
        <li>
            <section>
                <form action="{{route('order-status.update', ['id' => $invoice->id, 'status' => '400'])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" @if($invoice->status == 400) class="text-green-400" @else class="text-red-500" @endif>
                        <p>
                            Doma!
                        </p>
                        <i class="far fa-check-circle"></i>
                    </button>
                </form>
            </section>
        </li>
    </ul>
</section>
<section class="bg-gray-300  p-2 border border-black mb-1 flex justify-end mt-16">
    <a href="{{route('invoice.show', ['id' => $invoice->invoice_name])}}" class="w-full" target="_blank">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoice->created_at)->format('H:i | d.m.Y') }}</a>
</section>
@endsection