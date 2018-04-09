<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class SubscriptionsController extends Controller
{
    public function index($plan)
    {
        $plans = Plan::active()->get();

        return view('subscription.index', compact('plans', 'plan'));
    }

    public function store()
    {
        // code...
    }
}
