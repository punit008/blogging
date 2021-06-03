<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;

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

    function show(Post $post)
    {
        return view(
            'post.edit',
            compact('post')

        );
    }



    function store(PostCreateRequest $request)
    {
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


    function update(Request $request, $id)
    {

        $this->validate(
            $request,
            [
                'title' => 'required|min:3|max:255',
                'content' => 'required|min:30'
            ]
        );

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user->user_post()->attach($post->id);

        return back()->with('message', "Post Updated");
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $id = auth()->user()->id;
        if ($post->user_id === $id) {
            $post->delete();
            return back()->with('message', 'Post Deleted');
        } else {
            return back()->with('message', 'Your are not original author');
        }
    }
}
