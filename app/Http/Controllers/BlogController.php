<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    function index() {
        $posts = Post::paginate(5);
        return view('index', compact('posts'));
    
    }
}
