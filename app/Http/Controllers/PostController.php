<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        return view('blog/posts');
    }

    public function store(Request $request)
    {
        // store code
    }
}
