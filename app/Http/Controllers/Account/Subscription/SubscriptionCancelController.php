<?php

namespace App\Http\Controllers\Account\Subscription;

use App\Http\Controllers\Controller;

class SubscriptionCancelController extends Controller
{
    public function index()
    {
        return view('account.subscription.cancel.index');
    }
}
