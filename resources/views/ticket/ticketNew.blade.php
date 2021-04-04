@extends('layouts.ticket-layout')

@section('ticket')
    <section class="h-screen p-4">
        <form action="{{route('ticket.save')}}" method="POST">
            @csrf
            <input type="text" name="ticket_title" class="w-full border border-black p-2" placeholder="{{__('ticket.ticket-title')}}">
            <textarea name="ticket_text" rows="10" class="w-full border border-black p-2 mt-2" placeholder="{{__('ticket.ticket-message')}}"></textarea>
            <button type="submit" class="w-full p-4 bg-green-400 text-white text-xl">{{__('ticket.create-ticket')}}</button>
        </form>
    </section>
@endsection
