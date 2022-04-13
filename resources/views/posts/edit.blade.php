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
        <textarea name="description" id='body' class="textarea input-bordered h-52" placeholder="Post Body">{{$post['description']}}</textarea>
    </div>
    <div class="form-control w-full max-w-xs">
        <label class="label" for="author">
          <span class="label-text">Author</span>
        </label>
        <select name="author" class="input input-bordered
      block
      w-full
      px-3
      py-1.5
      font-normal
      rounded
      transition
      ease-in-out
      m-0
      " aria-label="Default select example" id="author">
        <option value={{$post->user_id}}  selected>{{$post->user->name}}</option>
        @foreach($users as $user)
        @if($user->id !== $post->user_id)
          <option  value={{$user->id}}>{{$user->name}}</option>
        @endif
        @endforeach
        </select>
    </div>
    <div class="form-actions flex flex-row-reverse w-full max-w-xs mt-4">
        <button type="sumbit" class="btn btn-primary btn-sm md:btn-md">Create Post</button>
    </div>
</form>
@endsection