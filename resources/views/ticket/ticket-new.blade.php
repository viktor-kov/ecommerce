@extends('layouts.ticket-layout')

@section('ticket')
    <section class="h-screen p-4">
        <form action="{{route('ticket.save')}}" method="POST">
            @csrf
            <input type="text" name="ticket_title" class="w-full border border-black">
            <textarea name="ticket_text" rows="10" class="w-full border border-black mt-2"></textarea>
            <button type="submit" class="w-full p-4 bg-green-400">submit</button>
        </form>
    </section>
@endsection
