<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserAction;
use Illuminate\Http\Request;

class UserActions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        //getting the path where wea re redirecting
        $url = $request->path();
        //exploding the path on /
        $exploded = explode('/', $url);

        //if someone is in ticket, we dont want to log the action
        if(isset($exploded[0]) == 'ticket' && isset($exploded[2]) == 'show') {
            return $next($request);
        }

        //logging the user actions to db
        //homepage
        if($url == '/') {
            UserAction::create([
                'action' => '/',
            ]);
        }

        //there we are logging the 3 parameter of url - like what product user opened
        if(isset($exploded[2])) {
            UserAction::create([
                'action' => $exploded[2],
            ]);
        }

        return $next($request);
    }
}
