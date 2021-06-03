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
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    function index()
    {
        return view('post.index');
    }

    function store(Request $request)
    {


        // dd($request);
        $this->validate(
            $request,
            [
                'title' => 'required|min:3|max:255',
                'content' => 'required|min:3'
            ]
        );
        // Post::create([
        //     'title' => $request->title,
        //     'content' => $request->content,

        // ]);

        // dd($request->user()->posts);

        $id = $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content
        ])->id;

        dd(auth()->user()->id);


        // return back()->with('message', "Post Added");
    }
}
