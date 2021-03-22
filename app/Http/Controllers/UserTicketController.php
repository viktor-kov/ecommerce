<?php

namespace App\Http\Controllers;

use App\Models\UserTicket;
use Illuminate\Http\Request;
use App\Models\TicketMessage;
use App\Events\TicketMessageEvent;

class UserTicketController extends Controller
{
    //

    public function index() {
        if(auth()->user()->current_team_id == 1) {
            $tickets = UserTicket::where('status', 1)->orderBy('created_at', 'DESC')->get();
        }
        else {
            $tickets = UserTicket::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->get();
        }
        return view('ticket.ticket-index', ['tickets' => $tickets]);
    }

    public function newTicket() {
        return view('ticket.ticket-new');
    }

    public function saveTicket(Request $request) {

        $ticket_title = $request->ticket_title;
        $ticket_message = $request->ticket_text;

        $new_ticket = UserTicket::create([
            'title' => $ticket_title,
            'user_id' => auth()->id(),
        ]);

        TicketMessage::create([
            'ticket_id' => $new_ticket->id,
            'user_id' => auth()->id(),
            'ticket_message' => $ticket_message,
        ]);

        return redirect()->route('ticket.show', ['ticket_id' => $new_ticket->id]);
    }

    public function showTicket($ticket_id) {
        $ticket_status = UserTicket::findOrFail($ticket_id)->status;

        $messages = TicketMessage::all()->where('ticket_id', $ticket_id);
        return view('ticket.ticket', ['messages' => $messages, 'ticket_id' => $ticket_id, 'ticket_status' => $ticket_status]);
    }

    public function storeTicketMesage($ticket_id, Request $request) {
        $message = $request->ticket_text;

        TicketMessage::create([
            'ticket_id' => $ticket_id,
            'user_id' => auth()->id(),
            'ticket_message' => $message,
        ]);
        
        event(new TicketMessageEvent($message, $ticket_id));
        return back();
    }

    public function ticketStatus($ticket_id) {
        UserTicket::where('id', $ticket_id)->update([
            'status' => '0',
        ]);

        return redirect()->route('tickets.index');
    }
}
