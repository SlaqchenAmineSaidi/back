<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentControlleur extends Controller
{
    public function make(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);
 
        $comment = Comment::create([
            'rating' =>$request->rating,
            'comment' =>$request->comment,
            'user_id'=>$request->user()->id
        ]);
        return response()->json($comment);
    }

    public function showComments($id)
    {
        $comments=Comment::where('user_id',$id)->get();
        return response()->json($comments);
    }
}
