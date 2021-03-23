<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TicketMessage;
use App\Events\TicketMessageEvent;

class AddTicketMessage extends Component
{
    public $ticket_text;
    public $ticket_id;

    public function saveMessage()
    {   
        $this->validate([
            'ticket_text' => 'required',
        ]);

        TicketMessage::create([
            'ticket_id' => $this->ticket_id,
            'user_id' => auth()->id(),
            'ticket_message' => $this->ticket_text,
        ]);

        event(new TicketMessageEvent($this->ticket_text, $this->ticket_id));

        $this->ticket_text = "";
    }


    public function render()
    {
        return view('livewire.add-ticket-message');
    }
}
