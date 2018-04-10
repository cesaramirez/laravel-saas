<?php

namespace App\Http\Controllers\Account\Subscription;

use App\Http\Controllers\Controller;

class SubscriptionSwapController extends Controller
{
    public function index()
    {
        return view('account.subscription.swap.index');
    }
}
