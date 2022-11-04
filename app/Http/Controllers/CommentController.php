<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Posts;   
class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        // store code
        $comment = new Comment();   
        $comment->body = $request->body;    
        //get the user id
        $comment->user_id = auth()->user()->id; 
        //get the post id
        $comment->posts_id = $request->post_id;
        $comment->parent_id = $request->parent_id;
        $comment->save();   

        return redirect()->back();

         
    }
}
