<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        // store code
        $comment = new Comment();
        $comment->body = $request->get('body');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->get('post_id');
        $comment->comments()->save($comment);

        return redirect()->back();
         
    }
}
