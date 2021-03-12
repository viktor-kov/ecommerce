@extends('layouts.auth-master')

@section('content')
    <section class="w-full sm:w-4/5 lg:w-1/2 m-auto mt-20 p-4">
        <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="">
                @csrf

                <div>
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" class="block mt-1 w-full border p-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                </div>

                <div class="mt-4">
                    <label for="email">{{ __('auth.email') }}</label>
                    <input id="email" class="block mt-1 w-full border p-2" type="email" name="email" :value="old('email')" required>
                </div>

                <div class="mt-4">
                    <label for="password">{{ __('auth.password') }}</label>
                    <input id="password" class="block mt-1 w-full border p-2" type="password" name="password" required autocomplete="new-password">
                </div>

                <div class="mt-4">
                    <label for="password_confirmation">{{ __('auth.confirmpassword') }}</label>
                    <input id="password_confirmation" class="block mt-1 w-full border p-2" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="flex items-center justify-end">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('auth.alreadyregistered') }}
                    </a>

                    <button class="ml-4 bg-green-400 p-2 text-white rounded mt-2">
                        {{ __('auth.register') }}
                    </button>
                </div>
            </form>
    </section>
@endsection