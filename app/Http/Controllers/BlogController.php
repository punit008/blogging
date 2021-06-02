<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index() {
        $posts = Post::get();
        return view('index', compact('posts'));
    }
}
