<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterCreateRequest;

class RegisterController extends Controller
{

    function index()
    {
        return view('auth.register');
    }

    function store(RegisterCreateRequest $request)
    {

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login');
    }
}
