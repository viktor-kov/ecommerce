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
        $last_segment = $request->segment(count($request->segments()));

        //home page
        if($last_segment == NULL) {
            $last_segment = "/";

            UserAction::create([
                'action' => $last_segment,
            ]);
        }

        //profile page
        if($last_segment == "profile") {
            UserAction::create([
                'action' => $last_segment,
            ]);
        }

        //if we visit products page
        if($request->segment(count($request->segments()) - 2) == "products") {
            $last_segment = "products";

            UserAction::create([
                'action' => $last_segment,
            ]);
        }
        
        return $next($request);
    }
}
