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
        $posts = auth()->user()->posts()->latest()->paginate(10);
        return inertia('Posts/Index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request) {
        auth()->user()->posts()->create($request->validate());
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post) {
        $post->update($request->validate());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostRequest $post) {
        $post->delete();
    }
}
