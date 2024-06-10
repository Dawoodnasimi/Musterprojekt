<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request) {
        auth()->user()->post()->create($request->validated());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post) {
        $post->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) {
        $post->delete();
    }
}
