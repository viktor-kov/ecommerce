@extends('layouts.master')

@section('content')
    <section class="grid grid-cols-2 mt-10 p-10 justify-center">
        <section class="avatar flex flex-col m-auto">
            <img src="{{asset('img/avatars/'.auth()->user()->profile_photo_path)}}" alt="" class="h-72 w-72 rounded-full border border-black">
            <section class="mt-8">
                <form action="./avatar_update" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="profile_photo_path" value="{{auth()->user()->profile_photo_path}}">
                    <input type="file" name="avatar">
                    <input type="submit" value="Nahrať" class="p-2 bg-green-500 text-white block mt-2">
                </form>
            </section>
        </section>
        <aside class="flex flex-col w-3/4 m-auto p-8 bg-gray-200 rounded border border-gray-400">
            <h1>Meno: <span>{{auth()->user()->name}}</span></h1>
            <h2>Email: <span>{{auth()->user()->email}}</span></h2>
            <section>
                <form action="">
                    @csrf
                    <aside class="mt-4">
                        <p class="flex justify-between m-1">
                            Staré heslo: <input type="password" name="password" class="border border-black p-1">
                        </p>
                        <p class="flex justify-between m-1">
                            Nové heslo: <input type="password" name="new-password" class="border border-black p-1">
                        </p>
                        <p>
                            <input type="submit" value="Aktualizovať" class="p-2 bg-green-500 text-white">
                        </p>
                    </aside>
                </form>
            </section>
            @if (auth()->user()->current_team_id == 1)
                <section>
                    <a href="{{route('adminpanel')}}" class="p-2 bg-blue-500 text-white block text-center mt-4">adminpanel</a>
                </section>
            @endif
        </aside>
    </section>
    <div class="line border border-black"></div>
    <main>
        <section>
            <h1 class="text-3xl">Fakturačné údaje</h1>
            <form action="./informations_update" method="post">
                @csrf 
                <section class="flex flex-col mb-2 justify-between">
                    <p class="w-1/2">
                        Meno: <input type="text" name="name" class="border border-black block w-4/5 p-1" @if ($informations) value="{{$informations->name}} @endif">
                    </p>
                    <p class="w-1/2 block">
                       Priezvisko: <input type="text" name="lastname" @if ($informations) value="{{$informations->lastname}} @endif" class="border border-black block w-4/5 p-1">
                    </p>
                </section>
                <section class="flex mb-2 justify-between">
                    <p>
                        Mesto: <input type="text" name="town" @if ($informations) value="{{$informations->town}}" @endif class="border border-black block p-1">
                    </p>
                    <p>
                        PSČ: <input type="text" name="psc" @if ($informations) value="{{$informations->psc}}" @endif class="border border-black block p-1">
                    </p>
                    <p>
                        Ulica: <input type="text" name="street" @if ($informations) value="{{$informations->street}}" @endif class="border border-black block p-1">
                    </p>
                    <p>
                        Číslo domu: <input type="text" name="house_id" @if ($informations) value="{{$informations->house_id}}" @endif class="border border-black block p-1">
                    </p>
                </section>
                <p>
                    Telefónne číslo: <input type="text" name="phone_number" @if ($informations) value="{{$informations->phone_number}}" @endif class="border border-black block p-1">
                </p>
                <p>
                    <input type="submit" value="Uložiť údaje" class="p-2 bg-green-500 text-white mt-2 mb-2">
                </p>
            </form>
        </section>
    <div class="line border border-black mb-1"></div>
    </main>
    <section>
        <h1 class="text-3xl">Predošlé objednávky</h1>
        <ul>
        @for ($i = 0; $i < 5; $i++)
            <li class="w-auto bg-gray-300  p-2 border border-black mb-1 flex justify-end"><a href="" class="mr-4">Odstrániť</a><a href="" class="">Stiahnuť</a></li>
        @endfor
        </ul>
    </section>
@endsection
