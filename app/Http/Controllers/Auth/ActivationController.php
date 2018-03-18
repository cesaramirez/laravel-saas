<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ConfirmationToken;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function activate(ConfirmationToken $token, Request $request)
    {
        $token->user->update([
            'activated' => true,
        ]);

        $token->delete();

        auth()->loginUsingId($token->user->id);

        return redirect()->intended($this->redirectPath())
                         ->with('success', 'You are now signed in.');
    }

    public function redirectPath()
    {
        return $this->redirectTo;
    }
}
