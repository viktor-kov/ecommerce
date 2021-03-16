@extends('layouts.adminlayout')


@section('stats')

<table class="w-full mt-4">
    <tr class="text-left bg-green-300 text-xl">
        <th>
            {{__('products.product-name')}}
        </th>
        <th>
            {{__('products.product-qty')}}
        </th>
        <th>
            {{__('products.product-price')}}
        </th>
    </tr>
    @foreach ($order as $product)
        <tr class="bg-gray-100 mt-2">
            <td>
                {{$product->product_name}}
            </td>
            <td>
                {{$product->quantity}}
            </td>
            <td>
                {{$product->price}}
            </td>
        </tr>
    @endforeach
</table>
{{$total_sum}}€
<a href="{{route('order-status.update', [
    'id' => $product->invoice_id,
])}}" class="w-full block p-4 bg-green-400 text-center">Update order</a>

@endsection