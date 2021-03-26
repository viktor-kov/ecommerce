@extends('layouts.ticket-layout')

@section('ticket')
    <section class="min-h-screen p-4">
        <form action="{{route('ticket.new')}}" method="GET">
            <button type="submit" class="w-full p-4 bg-green-400">{{__('ticket.new-ticket')}}</button>
        </form>
        <ul>
            @forelse ($tickets as $ticket)
                <li class="p-2 w-full bg-gray-300 mt-1">
                    <a href="{{route('ticket.show', ['ticket_id' => $ticket->id])}}">
                        <span class="grid grid-cols-3">
                            <p>{{$ticket->title}}</p>
                            <p class="flex justify-center">@if ($ticket->status == 1) {{__('ticket.is-open')}} @else {{__('ticket.ticket-closed')}} @endif</p>
                            <p class="flex justify-end">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ticket->created_at)->format('H:i | d.m.Y') }}</p>
                        </span>
                    </a>
                </li>
            @empty
                <li class="w-full text-2xl text-gray-300">no tickets</li>
            @endforelse
        </ul>
    </section>
@endsection
