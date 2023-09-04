<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post, CommentRequest $request)
    {
        $comment = Comment::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);

        if ($comment) {
            return back()->with('success', 'Comment Added Successfully ');
        } else {
            return back()->with('error', 'Comething went wrong');
        }
    }
}
