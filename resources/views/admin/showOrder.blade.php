@extends('layouts.adminlayout')


@section('stats')
<section class="p-2">
    <table class="w-full mt-4">
        <tr class="text-left bg-green-400 text-xl">
            <th class="p-2 border border-black">
                {{__('products.product-name')}}
            </th>
            <th class="p-2 border border-black text-right">
                {{__('products.product-qty')}}
            </th>
            <th class="p-2 border border-black text-right">
                {{__('products.product-price')}}
            </th>
        </tr>
        @foreach ($order as $product)
            <tr class="mt-2 text-lg">
                <td class="p-2 border border-black">
                    {{$product->product_name}}
                </td>
                <td class="p-2 border border-black text-right">
                    {{$product->quantity}}
                </td>
                <td class="p-2 border border-black text-right">
                    {{number_format($product->price, 2, '.', ' ')}}€
                </td>
            </tr>
        @endforeach
    </table>
    <table class="w-full mt-2 mb-2 text-lg">
        <tr>
            <td class="border border-black w-1/4 p-2">{{__('order.total-sum')}}</td>
            <td class="border border-black w-3/4 p-2 text-right">{{number_format($total_sum, 2, '.', ' ')}}€</td>
        </tr>
    </table>
    <section class="w-full h-24 mt-16">
        <ul class="flex justify-around text-2xl">
            <li class="pr-4">
                <section>
                    <form action="{{route('order-status.update', ['id' => $invoice->id, 'status' => '200'])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" @if($invoice->status >= 200) class="text-green-400" @else class="text-red-500" @endif>
                            <p>
                                {{__('order.packed')}}
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
                        <button type="submit" @if($invoice->status >= 300) class="text-green-400" @else class="text-red-500" @endif>
                            <p>
                                {{__('order.shipped')}}
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
                                {{__('order.is-home')}}
                            </p>
                            <i class="far fa-check-circle"></i>
                        </button>
                    </form>
                </section>
            </li>
        </ul>
    </section>
    @if ($invoice->status == 400 && $invoice->active == 1)
        <section>
            <form action="{{route('order.finish', ['id' => $invoice->id])}}" method="POST" class="w-full">
                @csrf
                @method('PUT')
                <button type="submit" class="w-full p-2 bg-green-400 text-white">
                    {{__('order.update-status')}}
                </button>
            </form>
        </section>
    @endif
    @if ($invoice->active == 0)
        <section class="w-full p-2 bg-green-400 text-white text-center">
            <p>{{__('order.completed')}}</p>
        </section>
    @endif
    <section class="bg-gray-300  p-2 border border-black mb-1 flex justify-end mt-4">
        <a href="{{route('invoice.show', ['id' => $invoice->invoice_name])}}" class="w-full" target="_blank">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoice->created_at)->format('H:i | d.m.Y') }}</a>
    </section>
    <section>
        <h1 class="text-3xl">{{__('order.ship-adress')}}</h1>
        <table class="w-full">
            <tr>
                <td class="border border-black p-1 w-1/4">{{__('profile.name')}}</td>
                <td class="border border-black p-1">{{$invoice->name}}</td>
            </tr>
            <tr>
                <td class="border border-black p-1 w-1/4">{{__('profile.lastname')}}</td>
                <td class="border border-black p-1">{{$invoice->lastname}}</td>
            </tr>
            <tr>
                <td class="border border-black p-1 w-1/4">{{__('profile.email')}}</td>
                <td class="border border-black p-1">{{$invoice->email}}</td>
            </tr>
            <tr>
                <td class="border border-black p-1 w-1/4">{{__('profile.town')}}</td>
                <td class="border border-black p-1">{{$invoice->town}}</td>
            </tr>
            <tr>
                <td class="border border-black p-1 w-1/4">{{__('profile.psc')}}</td>
                <td class="border border-black p-1">{{$invoice->psc}}</td>
            </tr>
            <tr>
                <td class="border border-black p-1 w-1/4">{{__('profile.street')}}</td>
                <td class="border border-black p-1">{{$invoice->street}}</td>
            </tr>
            <tr>
                <td class="border border-black p-1 w-1/4">{{__('profile.house-id')}}</td>
                <td class="border border-black p-1">{{$invoice->house_id}}</td>
            </tr>
            <tr>
                <td class="border border-black p-1 w-1/4">{{__('profile.phone-number')}}</td>
                <td class="border border-black p-1">{{$invoice->phone_number}}</td>
            </tr>
        </table>
    </section>
    <section class="w-full">
        <iframe class="w-full h-96 p-2"
                style="border:0"
                loading="lazy"
                allowfullscreen
                src="https://www.google.com/maps/embed/v1/place?key={{env('GOOGLE_API')}}&q={{$invoice->town}}">
        </iframe>
    </section>
</section>
@endsection
