<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Inertia\Inertia;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index() {
        $posts = Post::all();

        if ($posts->isEmpty()) {
            return Inertia::render('Posts/Create');
            dd('No posts found');
        }

        return Inertia::render('Posts/Index', ['posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Inertia\Response
     */
    public function store(PostRequest $request) {
        $post = Post::create($request->validated());

        return Inertia::render('Posts/Show', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Inertia\Response
     */
    public function update(PostRequest $request, Post $post) {
        $post->update($request->validated());

        return Inertia::render('Posts/Show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Inertia\Response
     */
    public function destroy(Post $post) {
        $post->delete();

        return Inertia::render('Posts/Index');
    }
}
