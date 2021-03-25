<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\EmailSubscription;
use Illuminate\Http\Request;
use App\Models\Subscriptions;

class SubscribeController extends Controller
{
    public function store(StoreSubscriptionRequest $request) {

        $subscription = EmailSubscription::firstOrCreate(
            ['email' => $request->email]
        );

        return back()->with('success', __('other.thankyou-for-subscribing'));
    }
}
