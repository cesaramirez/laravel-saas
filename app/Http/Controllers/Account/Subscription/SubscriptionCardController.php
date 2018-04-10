<?php

namespace App\Http\Controllers\Account\Subscription;

use App\Http\Controllers\Controller;

class SubscriptionCardController extends Controller
{
    public function index()
    {
        return view('account.subscription.card.index');
    }
}
