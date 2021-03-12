@extends('layouts.auth-master')

@section('content')
    <section class="w-full sm:w-4/5 lg:w-1/2 m-auto mt-20 p-4">
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email" class="">{{ __('auth.email') }}</label>
                <input id="email" class="block mt-1 w-full border p-2" type="email" name="email" required autofocus>
            </div>

            <div class="mt-4 w-full">
                <label for="password">{{ __('auth.password') }}</label>
                <input id="password" class="block mt-1 w-full border p-2" type="password" name="password" required autocomplete="current-password">
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('auth.rememberme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="ml-4 bg-green-400 p-2 text-white rounded">
                    {{ __('auth.login') }}
                </button>
            </div>
        </form>
    </section>
@endsection