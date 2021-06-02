<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class PostController extends Controller
{


    function index() {
        return view('post.index');
    }

    function store(Request $request) {


        // dd($request);
        $this->validate($request, 
            [
                'title' => 'required|min:3|max:255',
                'content' => 'required|min:3|max:255'
            ]
        );
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => $request->author_id
        ]);

        // return back()->with('message', "Post Added");
    }

    public function login(Request $request) {
        // dd($user);

        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Session::put('user_id', Auth::user()->id);
            $request->session()->put('user_id', Auth::user()->id);
            dd($request->session()->all());

            // return redirect()->intended('dashboard');
        }
        // Auth::login($user);
        // return redirect('/');
    }

    public function login_view(){
        return view('auth.login');
    }

    public function register_view() {
        return view('auth.register');
    }
    public function register(Request $request) {


        // dd($request);

        $this->validate(
            $request,
            [
                'username' => 'required|min:3|max:250',
                'email' => 'required|email|max:250',
                'password' => 'required|confirmed'
            ]
        );
        User::create(
            [
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]
        );
    }

    public function logout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('auth.login');
        }

}
