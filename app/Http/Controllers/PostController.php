<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public static $posts = [
        ['id' => 1, 'title' => 'Food', 'desc' => 'lorem lorem lorem lorem lorem lorem lorem lorem ', 'createdAt' => '2012-10-17', 'author' => 'Elzohery'],
        ['id' => 2, 'title' => 'Cars', 'desc' => 'lorem lorem lorem lorem lorem lorem lorem lorem ', 'createdAt' => '2014-07-14', 'author' => 'Mohamed'],
        ['id' => 3, 'title' => 'Sea', 'desc' => 'lorem lorem lorem lorem lorem lorem lorem lorem ', 'createdAt' => '2017-11-22' ,'author' => 'Elsayed'],
    ];
    public function index(){
        $allPosts = self::getAllPosts();
        session()->put('posts', $allPosts);
        return view('posts.index', ['allPosts' => $allPosts]);
    }

    public function create(){
        return view('posts.create');
    }
    
    public function store(Request $req){
        $allPosts = self::getAllPosts();
        $newPost = ['id' => end($allPosts)['id'] + 1, 'title'=> $req->title, 'desc' => $req->desc, 'author' => $req->author, 'createdAt' => date("Y-m-d")];
        array_push($allPosts, $newPost);
        session()->put('posts', $allPosts);
        return redirect('/posts');
    }

    public function view($postId){
        $post = self::getPostById($postId);
        return view('posts.view', ['post' => $post]);
    }

    public function edit($postId){
        $post = self::getPostById($postId);
        return view('posts.edit', ['post' => $post]);
    }

    public function update($postId, Request $req){
        $post = self::getPostById($postId);
        $updatedPost = ['id' => $post['id'], 'title'=> $req->title, 'desc' => $req->desc, 'author' => $req->author, 'createdAt' => $post['createdAt']];
        $allPosts = self::getAllPosts();
        $postsLength = count($allPosts);
        for($i = 0 ; $i<$postsLength ; $i++){
            if($allPosts[$i]['id'] === (int)$postId){
                $allPosts[$i] = $updatedPost;
                break;
            }
        }
        session()->put('posts', $allPosts);
        return redirect('/posts');
    }

    public function delete($postId){
        $allPosts = self::getAllPosts();
        $arr = [];
        foreach($allPosts as $post){
            if($post['id'] !== (int)$postId){
                array_push($arr, $post);
            }
        }
        session()->put('posts', $arr);
        return redirect('/posts');
    }

    public function flush(){
        session()->forget('posts');
        return redirect('/posts');

    }

    private function getPostById($id){
        $allPosts = self::getAllPosts();
        foreach($allPosts as $post){
            if($post['id'] === (int)$id){
                return $post;
            }
        }
    }

    private function getAllPosts(){
        if(!Session::has('posts')){
            $allPosts = self::$posts;
        }else{
            $allPosts = Session::get('posts');
        }
        session()->put('posts', $allPosts);
        return $allPosts;
    }
}
