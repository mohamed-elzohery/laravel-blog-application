<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $allPosts =  Post::paginate(8);
        return view('posts.index', ['allPosts' => $allPosts]);
    }

    public function create(){
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }
    
    public function store(Request $req){
        Post::create([
            'title' => $req->title,
            'description' => $req->desc,
            'user_id' => $req->author
        ]);
        return redirect('/posts');
    }

    public function view($postId){
        $post = Post::where('id', $postId)->first();
        return view('posts.view', ['post' => $post]);
    }

    public function edit($postId){
        $post = Post::where('id', $postId)->first();
        $users = User::all();
        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }

    public function update($postId, Request $req){
        $post = Post::where('id', $postId)->first()->update([
            'title' => $req->title,
            'description' => $req->description,
            'user_id' => $req->author,
        ]);
        return redirect('/posts');
    }

    public function delete($postId){
        Post::where('id', $postId)->delete();
        return redirect('/posts');
    }
}
