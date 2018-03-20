<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class PlansController extends Controller
{
    public $plans;

    public function __construct(Plan $plans)
    {
        $this->plans = $plans;
    }

    public function index()
    {
        $plans = $this->plans->active()->forUsers()->get();

        return view('subscription.plans.index', compact('plans'));
    }
}
