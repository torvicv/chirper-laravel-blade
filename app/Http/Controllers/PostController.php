<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', Auth::user());
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        //
        $this->authorize('create', Auth::user());
        $user = User::find(Auth::user()->id);
        $post = new Post;
        $post->fill($request->all());
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();
        $user->posts()->save($post);
        $user->save();
        return to_route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        $this->authorize('view', $post);
        $postShow = Post::find($post->id);
        return view('posts.show', [
            'post' => $postShow
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $this->authorize('update', $post);
        $post = Post::find($post->id);
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        //
        $this->authorize('restore', $post);
        $post = Post::find($post->id);
        $post->fill($request->all());
        $post->updated_at = Carbon::now();
        $post->update();
        return to_route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $this->authorize('delete', $post);
        $post = Post::find($post->id);
        $post->delete();
        return to_route('post.index');
    }
}
