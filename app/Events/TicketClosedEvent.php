<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TicketClosedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ticket_id;

    public $ticket_status;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ticket_id)
    {
        $this->ticket_id = $ticket_id;
        $this->ticket_status = "closed";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('ticket-channel.'.$this->ticket_id);
    }

    public function broadcastAs()
    {
        return 'message-event';
    }
}
