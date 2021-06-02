<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;

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
        dd("Hello");
    }

    public function login_view(){
        return view('auth.login');
    }

    public function register_view() {
        return view('auth.register');
    }
    public function register(Request $request) {
        dd($request);
    }

}
