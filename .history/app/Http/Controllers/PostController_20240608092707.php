<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {


        //Erste Variante, wo man bistimmte Felder von der Tabelle auswählt und zurückgibt
        /* $posts = Post::select(['title', 'author', 'content'])
            ->get()
            ->map(function ($post) {
                return [
                    'title' => $post->title,
                    'author' => $post->author,
                    'content' => $post->content,
                ];
            });

        return Inertia::render('Index', [
            'posts' => $posts,
        ]); */

        //Zweite Variante, wo man alle Felder auswählt aber nur bestimmte Felder zurückgibt
        $posts = Post::all()->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'author' => $post->author,
                'content' => $post->content,
            ];
        });


        return Inertia::render('Index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Post $post) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) {
        return Inertia::render('Show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) {
        //
    }
}
