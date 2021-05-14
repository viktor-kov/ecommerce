@extends('layouts.master')

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
    <section class="grid grid-cols-1 md:grid-cols-2 mt-2 md:mt-10 md:p-10">
        <section class="avatar flex flex-col mx-auto">
            <img src="{{asset('img/avatars/'.auth()->user()->profile_photo_path)}}" alt="" class="h-72 w-72 mx-auto rounded-full border border-black">
            <section class="mt-8">
                <form action="{{route('avatar.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="file" name="avatar">
                    <input type="submit" value="{{__('profile.update-avatar')}}" class="p-2 bg-green-500 text-white block mt-2 w-full cursor-pointer">
                </form>
            </section>
        </section>
        <aside class="p-8 bg-gray-200 rounded border border-gray-400 mt-2">
            <h1>{{__('profile.name')}}: <span>{{auth()->user()->name}}</span></h1>
            <h2>{{__('profile.email')}}: <span>{{auth()->user()->email}}</span></h2>
            <section>
                @livewire('password-update')
            </section>
            @if (auth()->user()->current_team_id == 1)
                <section>
                    <a href="{{route('adminpanel')}}" class="p-2 bg-red-500 text-white block text-center mt-4 uppercase">{{__('admin.admin-panel')}}</a>
                </section>
            @endif
                <section>
                    <a href="{{route('tickets.index')}}" class="p-4 bg-green-500 text-white block text-center mt-4 text-xl">{{__('ticket.support')}}</a>
                </section>
        </aside>
    </section>
    <div class="line border border-black"></div>
    <main>
        <section>
            <h1 class="text-3xl">{{__('checkout.ship-adress')}}</h1>
            @livewire('user-informations-update', ['informations' => $informations])
        </section>
    <div class="line border border-black mb-1"></div>
    </main>
    <section>
        <h1 class="text-3xl">{{__('products.previous-orders')}}</h1>
        <ul>
        @foreach ($invoices as $invoice)
            <li class="bg-gray-300  p-2 border border-black mb-1 flex justify-end">
                <a href="{{route('orderguest.show', ['id' => $invoice->id])}}" class="w-full" target="_blank">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoice->created_at)->format('H:i | d.m.Y') }}</a>
            </li>
        @endforeach
        </ul>
    </section>
@endsection

