<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
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
        }
        return redirect()->route('dashboard');


    }
}
