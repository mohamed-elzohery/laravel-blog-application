<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function show($postId){
        $post = Post::where('id', $postId)->first();
        return new PostResource($post);
    }

    public function store(StorePostRequest $req){
        $input = $req->only(['title' , 'desc', 'author', 'photo']);
        $imageName = null;
        if($req->photo){
            $imageName = time().'.'.$input['photo']->extension();  
            $input['photo']->storeAs('public/images', $imageName);
        }
        $post = Post::create([
            'title' => $input['title'],
            'description' => $input['desc'],
            'user_id' => $input['author'],
            'photo' => $imageName
        ]);

        return [
            "success" => true,
            "data" => new PostResource($post),
            "msg" => "Post is created successfully"
        ];
    }
}
