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
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    function index()
    {
        $posts = Post::paginate(5);
        return view('index', compact('posts'));
    }

    function show(Post $post)
    {
        // dd($post);
        $user_name = UserPost::where('post_id', $post->id)
        ->get();
        $userId = array();
        foreach($user_name->unique('user_id') as $item){
            array_push($userId, $item['user_id']) ;
        }
        $users = User::whereIn('id', $userId)->get();
        
        
        return view('blog', compact('post'), compact('users'));
    }
}
