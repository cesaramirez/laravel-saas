<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\SubscriptionStoreRequest;
use App\Models\Plan;

class SubscriptionsController extends Controller
{
    public function index($plan = 'monthly')
    {
        $plans = Plan::active()->get();

        return view('subscription.index', compact('plans', 'plan'));
    }

    public function store(SubscriptionStoreRequest $request)
    {
        $request->user()->newSubscription('main', $request->plan)->create($request->token);

        return redirect(route('home'))->with('success', 'Thanks for becoming a subscriber.');
    }
}
