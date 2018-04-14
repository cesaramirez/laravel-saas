<?php

namespace App\Http\Controllers\Account\Subscription;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\SubscriptionTeamUpdateRequest;
use Illuminate\Http\Request;

class SubscriptionTeamController extends Controller
{
    public function index()
    {
        $team = request()->user()->team;

        return view('account.subscription.team.index', compact('team'));
    }

    public function update(SubscriptionTeamUpdateRequest $request)
    {
        $request->user()->team()->update($request->only('name'));

        return back()->with('success', 'Team name updated');
    }
}
