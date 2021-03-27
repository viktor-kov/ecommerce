@extends('layouts.ticket-layout')

@section('ticket')
    <section class="min-h-screen p-4">
        <h1 class="text-2xl">{{__('ticket.all-active-tickets')}}</h1>
        <hr>
        <ul id="tickets">
            @forelse ($tickets as $ticket)
                <li class="p-2 w-full bg-gray-300 mt-1">
                    <a href="{{route('ticket.show', ['ticket_id' => $ticket->id])}}">
                        <span class="grid grid-cols-2">
                            <p>{{$ticket->title}}</p>
                            <p class="flex justify-end">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ticket->created_at)->format('H:i | d.m.Y') }}</p>
                        </span>
                    </a>
                </li>
            @empty
                <li class="w-full text-2xl text-gray-300">{{__('ticket.no-tickets')}}</li>
            @endforelse
        </ul>
    </section>
@endsection


@section('footer-js')
<script>
    const pusher = new Pusher('1a6ad2db43fc05aa4fe4', {
        cluster: 'eu'
    });

    const channel = pusher.subscribe('all-tickets');
    channel.bind('new-ticket-event', function(data) {
        location.reload();
    });
</script>
@endsection