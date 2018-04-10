<?php

namespace App\Http\Controllers\Account\Subscription;

use App\Http\Controllers\Controller;

class SubscriptionResumeController extends Controller
{
    public function index()
    {
        return view('account.subscription.resume.index');
    }
}
