<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {

        $posts = Post::paginate(6)->through(fn ($post) => [
            'id' => $post->id,
            'title' => $post->title,
            'author' => $post->author,
            'content' => $post->content,
        ]);

        $noPosts = count($posts) == 0;

        return Inertia::render('Index', compact('posts', 'noPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return Inertia::render('Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $post) {
        $data = $post->validated(); //Regeln aus StorePostRequest.php werden hier angewendet
        $post = Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show() {
        //Not needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) {

        return Inertia::render('Edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post) {

        $data = $request->validated(); //Regeln aus StorePostRequest.php werden hier angewendet
        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) {

        $post->delete();
    }
}
