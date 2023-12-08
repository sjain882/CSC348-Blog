<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $userRoles = $user->roles();

        if (!$user->isMuted())
        {
            return view('post.create');
        }

        $posts = Post::paginate(10);
        session()->flash('messsage', 'You are currently muted!');
        return view('post.index', ['posts' => $posts])->with('message', 'You are currently muted!');
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
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $path = null;

        //$path = Storage::putFile('post_images', $request->file('image'));
        if ($request->file('image') != null)
        {
            $path = $request->file('image')->storePublicly('post_images');
        }
        else {
            $path = null;
        }

        $post = new Post;
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->image_path = $path;
        $post->user_id = Auth::id();
        $post->save();

        session()->flash('messsage', 'Post successfully created.');
        return redirect()->route('post.index')->with('message', 'Post successfully created.');

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

        $user = Auth::user();
        $userid = Auth::id();
        $post = Post::findOrFail($id);

        if (($userid == $post->user_id || $user->isAdmin()) && !$user->isMuted())
        {
            return view('post.edit', ['post' => $post]);
        }
        else {
            $posts = Post::paginate(10);
            session()->flash('messsage', 'You are currently muted!');
            return view('post.index', ['posts' => $posts])->with('message', 'You are not the author of this post!');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:2000',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        
        $path = null;

        //$path = Storage::putFile('post_images', $request->file('image'));
        if ($request->file('image') != null)
        {
            $path = $request->file('image')->storePublicly('post_images');
        }
        else {
            $path = null;
        }

        $post = Post::findOrFail($id);

        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->image_path = $path;
        $post->save();

        session()->flash('messsage', 'Post was edited.');
        return redirect()->route('post.index')->with('message', 'Post was edited.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $userid = Auth::id();
        $post = Post::findOrFail($id);

        if ($userid == $post->user_id || $user->isAdmin() || $user->isModerator())
        {
            $post->delete();
            return redirect()->route('post.index')->with('message', 'Post was deleted.');
        }
        else {
            $posts = Post::paginate(10);
            session()->flash('messsage', 'You are not the author of this post!');
            return view('post.index', ['posts' => $posts])->with('message', 'You are not the author of this post!');
        }


    }
}
