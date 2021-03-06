<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\EmailSubscription;

class SubscribeController extends Controller
{
    public function subscribeStore(StoreSubscriptionRequest $request) {

        $subscription = EmailSubscription::firstOrCreate(
            ['email' => $request->email]
        );

        return back()->with('success', __('other.thankyou-for-subscribing'));
    }
}
