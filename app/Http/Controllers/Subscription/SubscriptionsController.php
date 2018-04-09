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
        $subscription = $request->user()
                                ->newSubscription('main', $request->plan);

        if ($request->has('coupon')) {
            $subscription->withCoupon($request->coupon);
        }

        $subscription->create($request->token);

        return redirect(route('home'))->with('success', 'Thanks for becoming a subscriber.');
    }
}
