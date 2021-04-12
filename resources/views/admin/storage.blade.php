@extends('layouts.adminlayout')

@section('navigation')
    <section class="w-full">
        <ul class="p-2">
            @foreach ($products as $single_product)
                <li class="w-full border-b-2">
                    @livewire('storage-update', ['single_product' => $single_product])
                </li>
            @endforeach
        </ul>
        <section class="mt-1">
            {{$products->links()}}
        </section>
    </section>
@endsection
