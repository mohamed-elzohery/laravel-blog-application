<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(Request $req, $postId){
        $post = Post::find((int) $postId);
        $post->Comments()->create([
            'user_id' => 1,
            'body' => $req->comment,
            'commentable_id' => (int)$postId,
            'commentable_type' => Post::class,
        ]);
        return redirect('/posts/view/'.$postId);
    }

    public function delete($postId, $commentId){
        $post = Post::find((int) $postId);
        Comment::where('id', $commentId)->delete();
        return redirect('/posts/view/'.$postId);
    }

    public function view($postId, $commentId){
        $post = Post::find((int) $postId);
        $comment = Comment::where('id', (int)$commentId)->first();
        return view('comments.edit', ['post' => $post, 'comment' => $comment]);
    }

    public function edit($postId, $commentId, Request $req){
        $post = Post::find((int) $postId);
        Comment::where('id', $commentId)->first()->update([
            'body' => $req->comment
        ]);
        return redirect('/posts/view/'.$postId);
    }
}
