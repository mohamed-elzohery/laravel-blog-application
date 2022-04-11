@extends('layout.layout')

@section('title')edit {{$post['title']}}@endsection

@section('content')
<form class="max-w-md mx-auto flex flex-col items-center" action={{route('posts.edit', ['postId' => $post['id']])}} method="POST">
    @csrf
    <div class="form-control w-full max-w-xs ">
        <label class="label">
          <span class="label-text" for="title">Title</span>
        </label>
        <input value={{$post['title']}} name="title" type="text" id="title" placeholder="Post Title" class="input input-bordered w-full max-w-xs">
    </div>
    <div class="form-control w-full max-w-xs">
        <label class="label" for="body">
          <span class="label-text" >Body</span>
        </label>
        <textarea name="desc" id='body' class="textarea input-bordered h-52" placeholder="Post Body">{{$post['desc']}}</textarea>
    </div>
    <div class="form-control w-full max-w-xs">
        <label class="label" for="author">
          <span class="label-text">Author</span>
        </label>
        <input value={{$post['author']}} name="author" type="text" id="author" placeholder="Post Author" class="input input-bordered w-full max-w-xs">
    </div>
    <div class="form-actions flex flex-row-reverse w-full max-w-xs mt-4">
        <button type="sumbit" class="btn btn-primary btn-sm md:btn-md">Create Post</button>
    </div>
</form>
@endsection