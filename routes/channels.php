<?php

use App\Models\UserTicket;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('ticket-channel.{ticketId}', function ($ticketId) {
    return auth()->id() === UserTicket::where('id', $ticketId)->user_id || auth()->user()->id->current_team_id === 1;
});