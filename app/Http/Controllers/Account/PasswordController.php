<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\PasswordStoreRequest;
use App\Mail\Account\PasswordUpdated;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.password.index');
    }

    /**
     * Store data from auth user.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PasswordStoreRequest $request)
    {
        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);

        \Mail::to($request->user())->send(new PasswordUpdated());

        return redirect('account');
    }
}
