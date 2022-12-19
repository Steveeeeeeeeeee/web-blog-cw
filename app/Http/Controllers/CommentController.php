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
        $comment->body = $request->input('body');    
        //get the user id
        $comment->user_id = auth()->user()->id; 
        //get the post id
        $comment->posts_id = $request->input('post_id');
        $comment->parent_id = $request->parent_id;
        $comment->save();   

        return response()->json([
            'comment' => [
                'id' => $comment->id,
                'body' => $comment->body,
                'created_at' => $comment->created_at,
                'user' => [
                    'id' => $comment->user->id,
                    'name' => $comment->user->name
                ]
            ]
        ]);

         
    }
    // delete a comment
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }   

    //edit a comment    
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comment.edit', compact('comment'));
    }

    //update a comment
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->body = $request->body;
        $comment->save();
        return redirect()->route('post', $comment->posts_id);
    }   
}
