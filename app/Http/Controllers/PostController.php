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

        $this->validate(
            $request,
            [
                'title' => 'required|min:3|max:255',
                'content' => 'required|min:3'
            ]
        );


        $id = $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content
        ])->id;

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user->user_post()->attach($id);

        // dd(auth()->user()->id);
        return back()->with('message', "Post Added");
    }
}
