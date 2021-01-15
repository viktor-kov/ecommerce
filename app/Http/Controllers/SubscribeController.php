<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use Illuminate\Http\Request;
use App\Models\Subscriptions;

class SubscribeController extends Controller
{
    public function store(StoreSubscriptionRequest $request) {

        $subscribe = new Subscriptions;

        if(Subscriptions::where('email', $request->email)->doesntExist()) {
            
            $subscribe->email = $request->email;
            $subscribe->save();
        }



        return back();
    }
}
