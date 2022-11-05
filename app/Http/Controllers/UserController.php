<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
use App\Models\PostController;
class UserController extends Controller
{
    // show a user with id $id from the users table
    // public function show($id)
    // {
    //     $user = user::find($id);
        
    //     return view('blog/userProfile', compact('user'));
    // }
    // find posts from the user
    public function profile($id)
    {
        $user = user::find($id);
        $posts = Posts::where('user_id', $id)->get();
        return view('blog/userProfile', compact('posts', 'user'));
    }   
}
