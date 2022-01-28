<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
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

    public function showComments()
    {
        $comments=Comment::with('user')->get();
        return response()->json($comments);
    }
}
