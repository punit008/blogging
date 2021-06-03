<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view(
            'post.edit',
            compact('post')

        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCreateRequest $request, $id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
