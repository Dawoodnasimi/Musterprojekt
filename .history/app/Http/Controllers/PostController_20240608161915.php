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

        return Inertia::render('Index', compact('posts'));
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

        //dd($post); //Hier wird der Post angezeigt

        $post->delete();
        // Get the current page number
        $currentPage = Paginator::resolveCurrentPage();

        // Get the posts for the current page
        $posts = Post::paginate(6, ['*'], 'page', $currentPage);

        // If all posts on the current page are deleted, get the posts for the previous page
        if ($posts->isEmpty() && $currentPage > 1) {
            $posts = Post::paginate(6, ['*'], 'page', $currentPage - 1);
        }

        // Flash the message
        session()->flash('error', 'Post deleted successfully!');

        // Return an Inertia response with the updated list of posts
        return Inertia::render('Index', [
            'posts' => $posts,
        ])->;
    }
}
