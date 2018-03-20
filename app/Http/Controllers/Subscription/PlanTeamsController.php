<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class PlanTeamsController extends Controller
{
    public $plans;

    public function __construct(Plan $plans)
    {
        $this->plans = $plans;
    }

    public function index()
    {
        $plans = $this->plans->active()->forTeams()->get();

        return view('subscription.plans.teams.index', compact('plans'));
    }
}
