<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $allPosts =  Post::paginate(8);
        return view('posts.index', ['allPosts' => $allPosts]);
    }

    public function create(){
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }
    
    public function store(StorePostRequest $req){
        $input = $req->only(['title' , 'desc', 'author']);

        Post::create([
            'title' => $input['title'],
            'description' => $input['desc'],
            'user_id' => $input['author']
        ]);
        return to_route('posts.index');
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

    public function update($postId, StorePostRequest $req){
        $post = Post::where('id', $postId)->first()->update([
            'title' => $req->title,
            'description' => $req->desc,
            'user_id' => $req->author,
        ]);
        return redirect('/posts');
    }

    public function delete($postId){
        Post::where('id', $postId)->delete();
        return redirect('/posts');
    }
}
