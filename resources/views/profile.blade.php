@extends('layouts.master')

@section('content')
    <section class="grid grid-cols-1 md:grid-cols-2 md:mt-10 md:p-10">
        <section class="avatar flex flex-col m-auto">
            <img src="{{asset('img/avatars/'.auth()->user()->profile_photo_path)}}" alt="" class="h-72 w-72 rounded-full border border-black">
            <section class="mt-8">
                <form action="./avatar_update" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="profile_photo_path" value="{{auth()->user()->profile_photo_path}}">
                    <input type="file" name="avatar">
                    <input type="submit" value="{{__('profile.update-avatar')}}" class="p-2 bg-green-500 text-white block mt-2 w-full cursor-pointer">
                </form>
            </section>
        </section>
        <aside class="p-8 bg-gray-200 rounded border border-gray-400 mt-2">
            <h1>{{__('profile.name')}}: <span>{{auth()->user()->name}}</span></h1>
            <h2>{{__('profile.email')}}: <span>{{auth()->user()->email}}</span></h2>
            <section>
                <form action="">
                    @csrf
                    <aside class="mt-4">
                        <p class="md:flex md:justify-between m-1">
                            <span class="break-words">Staré heslo:</span> <input type="password" name="password" class="w-full md:w-3/4 border border-black p-1">
                        </p>
                        <p class="md:flex md:justify-between m-1">
                            <span class="break-words">Nové heslo:</span> <input type="password" name="new-password" class="w-full md:w-3/4 border border-black p-1">
                        </p>
                        <p class="w-full">
                            <input type="submit" value="{{__('profile.update-pwd')}}" class="w-full p-2 bg-green-500 text-white mt-1 cursor-pointer">
                        </p>
                    </aside>
                </form>
            </section>
            @if (auth()->user()->current_team_id == 1)
                <section>
                    <a href="{{route('adminpanel')}}" class="p-2 bg-red-500 text-white block text-center mt-4 uppercase">{{__('admin.admin-panel')}}</a>
                </section>
            @endif
        </aside>
    </section>
    <div class="line border border-black"></div>
    <main>
        <section>
            <h1 class="text-3xl">{{__('checkout.ship-adress')}}</h1>
            <form action="./informations_update" method="post" class="p-1 w-full">
                @csrf 
                    <p class="w-full block">
                        {{__('profile.name')}} <input type="text" name="name" class="border border-black block w-full p-1" @if ($informations) value="{{$informations->name}} @endif">
                    </p>
                    <p class="w-full block">
                        {{__('profile.lastname')}} <input type="text" name="lastname" @if ($informations) value="{{$informations->lastname}} @endif" class="border border-black block w-full p-1">
                    </p>
                    <p>
                        {{__('profile.town')}} <input type="text" name="town" @if ($informations) value="{{$informations->town}}" @endif class="border border-black block p-1 w-full">
                    </p>
                    <p>
                        {{__('profile.zip')}} <input type="text" name="psc" @if ($informations) value="{{$informations->psc}}" @endif class="border border-black block p-1 w-full">
                    </p>
                    <p>
                        {{__('profile.street')}} <input type="text" name="street" @if ($informations) value="{{$informations->street}}" @endif class="border border-black block p-1 w-full">
                    </p>
                    <p>
                        {{__('profile.house-id')}} <input type="text" name="house_id" @if ($informations) value="{{$informations->house_id}}" @endif class="border border-black block p-1 w-full">
                     </p>
                    <p>
                        {{__('profile.phone-number')}} <input type="text" name="phone_number" @if ($informations) value="{{$informations->phone_number}}" @endif class="border border-black block p-1 w-full">
                    </p>
                    <p>
                        <input type="submit" value="{{__('profile.update-info')}}" class="p-2 bg-green-500 text-white mt-2 mb-2 w-full cursor-pointer">
                    </p>
            </form>
        </section>
    <div class="line border border-black mb-1"></div>
    </main>
    <section>
        <h1 class="text-3xl">{{__('products.previous-orders')}}</h1>
        <ul>
        @foreach ($invoices as $invoice)
            <li class="bg-gray-300  p-2 border border-black mb-1 flex justify-end">
                <a href="{{route('invoice.show', ['id' => $invoice->invoice_name])}}" class="w-full" target="_blank">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoice->created_at)->format('H:i | d.m.Y') }}</a>
                <a href="{{route('invoice.delete', ['id' => $invoice->invoice_name])}}" class="mr-4">
                    <i class="fas fa-trash"></i>
                </a>
            </li>
        @endforeach
        </ul>
    </section>
@endsection

