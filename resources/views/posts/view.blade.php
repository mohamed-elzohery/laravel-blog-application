
@extends('layout.layout')

@section('title')
    {{$post['title']}}
@endsection

@section('content')
    <div class=''>
        <h1 class="text-6xl">{{$post['title']}}</h1>
        <p class="text-md italic my-3 text-sm">created by <span class="text-content-base ">{{$post->user ? $post->user->name : 'unknown'}}</span> on {{\Carbon\Carbon::parse($post['created_at'])->format('M-d-Y');}}</p>
        @if($post->photo)
        <div class="my-4 w-80">
            <img src="{{ asset('storage/images/'.$post->photo) }}"  alt={{$post['title']."photo"}}/>
        </div>
        @endif
        <p class="text-lg mt-6">{{$post['description']}}</p>
    </div>
    
    <div class='mt-20 max-w-2xl' >
        @foreach ($post->comments as $comment) 
            <div class='flex flex-col mt-6 border p-4 rounded-lg border-slate-600' >
                <h2 class='text-lg'>{{$comment->user->name}}</h2>
                <p class='text-md'>{{$comment->body}}</p>
                <span class='text-sm text-gray-500'>last updated {{$comment->updated_at}}</span>
                <div class="flex items-center mt-5">
                    <form method='POST' action={{route('comments.delete', ['postId' => $post['id'], 'commentId' => $comment->id])}}>
                        @csrf
                        @method('DELETE')
                        <button type="sumbit" class='btn btn-xs btn-primary'>Delete</button>
                    </form>
                    <a class='btn btn-xs btn-success ml-4' href={{route('comments.view', ['postId' => $post['id'], 'commentId' => $comment->id])}}>
                        Edit
                    </a>
                </div>
            </div>
        @endforeach
        <div class='flex flex-col mt-6  p-4 rounded-lg' >
            @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-error w-80 shadow-lg mb-5">
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{$error}}</span>
                    </div>
                </div>
                @endforeach
            @endif
            <form method="POST" class='flex items-center' action={{route('comments.add', ['postId' => $post['id']])}}>
                @csrf 
                <label class="label mr-4">Add comment</label>
                <input class="input flex-1 input-xlg" placeholder="Add comment" type="text" name="comment" id="coment"/>
                <button type="sumbit" class='btn btn-info ml-4'>Add</button>
            </form>
        </div>
    </div>
@endsection