<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('user.index', ['users' => $users]);

        //$users = User::all();
        //return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $posts = Post::where('user_id', "=", $user->id)->paginate(10);
        return view('user.profile', ['user' => $user], ['posts' => $posts]);
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
        $user = User::findOrFail($id);
        $loggedInUser = Auth::user();

        //dd($loggedInUser->isModerator());
        
        if ($loggedInUser->isAdmin() || $loggedInUser->isModerator())
        {
            if ($user->isMuted())
            {
                $user->roles()->detach(Role::find(4));
                return redirect()->route('user.index')->with('message', 'User was unmuted.');
            }
            else
            {
                $user->roles()->attach(Role::find(4));
                return redirect()->route('user.index')->with('message', 'User was muted.');
            }

        }

        return redirect()->route('user.index')->with('message', 'You are not an admin or moderator!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userid = Auth::id();
        $user = User::findOrFail($id);

        if ($userid == $id || $user->isAdmin())
        {
            $user->delete();
            return redirect()->route('user.index')->with('message', 'User was deleted.');
        }
        else {
            $posts = Post::paginate(10);
            session()->flash('messsage', 'You are not this user, or an admin!');
            return view('post.index', ['posts' => $posts])->with('message', 'You are not this user, or an admin!');
        }
    }
}
