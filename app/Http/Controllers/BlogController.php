<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\UserPost;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index()
    {
        $posts = Post::paginate(5);

        return view('index', compact('posts'));
    }

    function show(Post $post)
    {
        $users = $post->user_post->pluck('name');
        
        return view('blog', compact('post'), compact('users'));
    }

}
