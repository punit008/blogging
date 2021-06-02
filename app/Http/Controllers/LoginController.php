<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function store(Request $request)
    {


        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
            // dd(auth()->user());
        } 
        return redirect()->route('dashboard');

         // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     // Session::put('user_id', Auth::user()->id);
        //     $request->session()->put('user_id', Auth::user()->id);
        //     dd($request->session()->all());

        //     // return redirect()->intended('dashboard');
        // }
    }
}
