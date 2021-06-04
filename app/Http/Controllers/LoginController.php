<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    function index()
    {
        return view('auth.login');
    }

    function store(LoginRequest $request)
    {

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }
        return redirect()->route('dashboard');


    }
}
