<?php

namespace App\Http\Controllers;

use App\Models\UserTicket;
use Illuminate\Http\Request;
use App\Models\TicketMessage;
use App\Events\TicketMessageEvent;

class UserTicketController extends Controller
{
    //show all tickets to admin or all tickets belongs to logged in user
    public function index() {
        if(auth()->user()->current_team_id == 1) {
            $tickets = UserTicket::where('status', 1)->orderBy('created_at', 'DESC')->get();
            return view('ticket.ticket-index', ['tickets' => $tickets]);
        }

        $tickets = UserTicket::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->get();
        return view('ticket.ticket-index', ['tickets' => $tickets]);
    }

    //new ticket
    public function newTicket() {
        return view('ticket.ticket-new');
    }

    //save the new ticket
    public function saveTicket(Request $request) {

        $ticket_title = $request->ticket_title;
        $ticket_message = $request->ticket_text;

        //creating the new ticket
        $new_ticket = UserTicket::create([
            'title' => $ticket_title,
            'user_id' => auth()->id(),
        ]);
        
        //saving the ticket message
        TicketMessage::create([
            'ticket_id' => $new_ticket->id,
            'user_id' => auth()->id(),
            'ticket_message' => $ticket_message,
        ]);
        
        //redireckting to the ticket
        return redirect()->route('ticket.show', ['ticket_id' => $new_ticket->id]);
    }

    //showing the ticket
    public function showTicket($ticket_id) {
        //finding the ticket if exists
        $ticket = UserTicket::findOrFail($ticket_id);

        //if the ticket is not belongs to logged in user or we are not a admin, show 403 error
        if($ticket->user_id != auth()->id() && auth()->user()->current_team_id != 1)
        {
            abort(403);
        }

        //ticket status
        $ticket_status = $ticket->status;

        //retrieving all messages in ticket
        $messages = TicketMessage::all()->where('ticket_id', $ticket_id);
        return view('ticket.ticket', ['messages' => $messages, 'ticket' => $ticket]);
    }

    //saving ticket message
    public function storeTicketMesage($ticket_id, Request $request) {
        $message = $request->ticket_text;

        //inserting the message to db
        TicketMessage::create([
            'ticket_id' => $ticket_id,
            'user_id' => auth()->id(),
            'ticket_message' => $message,
        ]);
        
        //creating the event
        event(new TicketMessageEvent($message, $ticket_id));
        return back();
    }

    //updating the ticket status
    public function ticketStatus($ticket_id) {
        UserTicket::where('id', $ticket_id)->update([
            'status' => '0',
        ]);

        return redirect()->route('tickets.index');
    }
}
