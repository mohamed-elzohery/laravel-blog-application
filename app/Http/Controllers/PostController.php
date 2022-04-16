<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Jobs\DeletePostJob;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $input = $req->only(['title' , 'desc', 'author', 'photo']);
        $imageName = null;
        if($req->photo){
            $imageName = time().'.'.$input['photo']->extension();  
            $input['photo']->storeAs('public/images', $imageName);
        }
        Post::create([
            'title' => $input['title'],
            'description' => $input['desc'],
            'user_id' => $input['author'],
            'photo' => $imageName
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
        $input = $req->only(['title' , 'desc', 'author', 'photo']);
        $post = Post::where('id', $postId)->first();
        if($req->photo){
            Storage::delete('public/images/'.$post->photo);
            $imageName = time().'.'.$input['photo']->extension();  
            $input['photo']->storeAs('public/images', $imageName);
        }else{
            $imageName = $post->photo;
        }
        $post->update([
            'title' => $input['title'],
            'description' => $input['desc'],
            'user_id' => $input['author'],
            'photo' => $imageName
        ]);
        return to_route('posts.index');
    }

    public function delete($postId){
        $post = Post::where('id', $postId)->first();
        // dd($post);
        if($post->photo){
            Storage::delete('public/images/'.$post->photo);
        }
        $post->delete();
        return to_route('posts.index');
    }

    public function removeOldPost(){
        dispatch(new DeletePostJob());
        echo "Posts are deleted successfully";
    }
}
