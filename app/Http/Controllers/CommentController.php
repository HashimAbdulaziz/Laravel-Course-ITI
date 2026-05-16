<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => ['required', 'min:3']
        ]);

        $post->comments()->create([
            'body' => $request->input('body'),

            'user_id' => Auth::user()?->id ?? 1, 
        ]);

        return back();
    }

    public function destroy(Comment $comment)
    {
        if (Auth::user()->id !== $comment->user_id) {
            return back();
        }

        $comment->delete();

        return back();
    }
}