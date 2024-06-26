<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {


        //Erste Variante, wo man bistimmte Felder von der Tabelle ausw�hlt und zur�ckgibt
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

        //Zweite Variante, wo man alle Felder ausw�hlt aber nur bestimmte Felder zur�ckgibt
        /*  $posts = Post::paginate(5)->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'author' => $post->author,
                'content' => $post->content,
            ];
        }); */

        $posts = Post::paginate(5)->through(function ($post) {
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

        /* return Inertia::render('Index', [
            'posts' => $posts->items(),
            'links' => $posts->toArray()['links'],
            'currentPage' => $posts->currentPage(),
        ]); */

        /*  dd($posts);

        return Inertia::render('Index', [
            'posts' => $posts,
        ]); */
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

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {

        $post = Post::find($id);

        if (!$post) {
            // Wenn der Post nicht gefunden wird, wird der User auf die Index-Seite weitergeleitet
            return redirect()->route('posts.index');
        }

        return Inertia::render('Show', [
            'post' => $post,
        ]);
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

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) {

        //dd($post); //Hier wird der Post angezeigt

        $post->delete();

        return redirect()->route('posts.index');
    }
}
