<?php

namespace App\Http\Controllers\Account\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionCancelController extends Controller
{
    public function index()
    {
        return view('account.subscription.cancel.index');
    }

    public function store(Request $request)
    {
        $request->user()->subscription('main')->cancel();

        return redirect()->route('account.index')
                         ->with('success', 'Your subscription has been cancelled.');
    }
}
