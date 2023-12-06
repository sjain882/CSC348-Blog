<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request['name']);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:2000',
            'image_path' => 'nullable'
        ]);

        $post = new Post;
        $post->name = $validatedData['name'];
        $post->body = $validatedData['body'];
        $post->image_path = $validatedData['image_path'];
        $post->user_id = 0;
        $post->save();

        session()->flash('messsage', 'Post successfully created.');
        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.single', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
