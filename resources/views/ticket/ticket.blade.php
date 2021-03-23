@extends('layouts.ticket-layout')

@section('ticket')
    <section class="min-h-screen p-4">
        <section>
            <ul id="ticketMessages">
                @forelse ($messages as $message)
                    <li class="w-full p-2 bg-gray-200 mb-1">{{$message->ticket_message}}</li>
                @empty
                    <li class="w-full text-2xl text-gray-300">nothing</li>
                @endforelse
            </ul>
        </section>
        <section class="w-full">
            @if ($ticket_status == 1)
                <form action="{{route('message.store', ['ticket_id' => $ticket_id])}}" method="POST" class="w-full">
                    @csrf
                    <textarea name="ticket_text" rows="10" class="w-full border border-black"></textarea>
                    <button type="submit" class="p-2 bg-green-500 text-white block mt-2 cursor-pointer w-full">Submit</button>
                </form>
            @else
                <p class="w-full p-4 text-3xl text-white bg-red-700">This ticket is Closed</p>
            @endif
            @if (auth()->user()->current_team_id == 1 && $ticket_status == 1)
                <form action="{{route('ticket.status', ['ticket_id' => $ticket_id])}}" method="POST" class="w-full">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="p-2 bg-gray-500 text-white block mt-2 cursor-pointer w-full">Ticket Status Update</button>
                </form>
            @endif
        </section>
    </section>
@endsection

@section('footer-js')
<script>

    let ticketMessages = $('#ticketMessages');

    const pusher = new Pusher('1a6ad2db43fc05aa4fe4', {
      cluster: 'eu'
    });

    const channel = pusher.subscribe('ticket-channel.{{$ticket_id}}');
    channel.bind('message-event', function(data) {
        let existingMessages = ticketMessages.html();
        let newMessageHTML = `<li class="w-full p-2 bg-gray-200 mb-1">`+data.message+`</li>`;
        ticketMessages.html(existingMessages + newMessageHTML);
    });
  </script>
@endsection