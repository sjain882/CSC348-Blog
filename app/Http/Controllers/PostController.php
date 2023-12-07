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
        $posts = Post::paginate(10);
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
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->image_path = $validatedData['image_path'];
        $post->user_id = 1;
        $post->save();

        session()->flash('messsage', 'Post successfully created.');
        return redirect()->route('post.index')->with('message', 'Post was created.');

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
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('message', 'Post was deleted.');
    }
}
