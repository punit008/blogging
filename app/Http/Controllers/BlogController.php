<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    function index()
    {
        $posts = Post::paginate(5);

        return view('index', compact('posts'));
    }

    function show(Post $post)
    {
        $users = $post->user_post->unique('name')->pluck('name');
        
        return view('blog', compact('post'), compact('users'));
    }

}
