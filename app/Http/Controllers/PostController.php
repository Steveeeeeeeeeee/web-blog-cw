<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;


class PostController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        return view('blog/createPost');
    }

    public function store(Request $request)
    {
        // store code
    }

    // show all posts with variable $posts
    public function show()
    {
        // paginate the posts   
        $posts = Posts::SimplePaginate(5);    
        return view('blog/posts', compact('posts'));
     
    }

    // show a post with id $id
    public function showId($id)
    {
        $post = Posts::find($id);
        return view('blog/postID', compact('post'));
    }
}
