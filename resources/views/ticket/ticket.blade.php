@extends('layouts.ticket-layout')

@section('ticket')
    <section class="min-h-screen p-4">
        <section>
            <table class="w-full table-fixed mb-8">
                <tr>
                    <th class="w-1/2 border border-black p-2">{{__('ticket.ticket-id')}}</th>
                    <th class="w-1/2 border border-black p-2">{{__('ticket.ticket-title')}}</th>
                </tr>
                <tr>
                    <td class="w-1/2 border border-black p-2">#{{$ticket->id}}</td>
                    <td class="w-1/2 border border-black p-2">{{$ticket->title}}</td>
                </tr>
            </table>
            <ul id="ticketMessages">
                @foreach ($messages as $message)
                    <li @if ($message->user_id == auth()->id()) class="w-full p-4 bg-green-100 mb-1 border border-black border-opacity-50"  @else class="w-full p-4 bg-gray-100 mb-1 border border-black border-opacity-50" @endif>{{$message->ticket_message}}</li>
                @endforeach
            </ul>
        </section>
        <section class="w-full mt-8">
            @if ($ticket->status == 1)
                @livewire('add-ticket-message', ['ticket_id' => $ticket->id])
            @else
                <p class="w-full p-4 text-3xl text-white bg-red-700">{{__('ticket.ticket-closed')}}</p>
            @endif
            @if (auth()->user()->current_team_id == 1 && $ticket->status == 1)
                <form action="{{route('ticket.status', ['ticket_id' => $ticket->id])}}" method="POST" class="w-full">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="p-2 bg-gray-500 text-white block mt-2 cursor-pointer w-full">{{__('ticket.update-status')}}</button>
                </form>
            @endif
        </section>
    </section>
@endsection

@section('footer-js')
<script>
    const logged_in = {{auth()->id()}}
    let ticketMessages = $('#ticketMessages');

    const pusher = new Pusher('1a6ad2db43fc05aa4fe4', {
      cluster: 'eu'
    });

    const channel = pusher.subscribe('ticket-channel.{{$ticket->id}}');
    channel.bind('message-event', function(data) {
        if(data.ticket_status === "closed") {
            location.reload();
            return 0;
        }

        let message_from = data.user_id;
        let newMessageHTML;

        if(logged_in == message_from) {

            newMessageHTML = `<li class="w-full p-4 bg-green-100 mb-1 border border-black border-opacity-50">`+data.message+`</li>`;
        }
        else {

            newMessageHTML = `<li class="w-full p-4 bg-gray-100 mb-1 border border-black border-opacity-50">`+data.message+`</li>`;
        }
       
        let existingMessages = ticketMessages.html();

        ticketMessages.html(existingMessages + newMessageHTML);
    });
  </script>
@endsection