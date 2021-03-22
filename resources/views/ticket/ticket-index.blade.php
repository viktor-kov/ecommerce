@extends('layouts.ticket-layout')

@section('ticket')
    <section class="min-h-screen p-4">
        <form action="{{route('ticket.new')}}" method="GET">
            <button type="submit" class="w-full p-4 bg-green-400">Create new Ticket</button>
        </form>
        <ul>
            @forelse ($tickets as $ticket)
                <li class="p-2 w-full bg-gray-300 mt-1">
                    <a href="{{route('ticket.show', ['ticket_id' => $ticket->id])}}">
                        <span class="flex justify-between">
                            <p>{{$ticket->title}}</p>
                            <p>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ticket->created_at)->format('H:i | d.m.Y') }}</p>
                        </span>
                    </a>
                </li>
            @empty
                <li>no tickets</li>
            @endforelse
        </ul>
    </section>
@endsection
