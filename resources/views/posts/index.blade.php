@extends('layout.layout')

@section('title') posts @endsection

@section('content')
<div class="overflow-x-auto">
    <table class="table max-w-7xl mx-auto w-full text-xl ">
      <!-- head -->
      <thead >
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>title-slug</th>
          <th>Author</th>
          <th>Published At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($allPosts as $post)
        <tr>
            <th>{{$post['id']}}</th>
            <th>{{$post['title']}}</th>
            <th>{{$post['title-slug']}}</th>
            <th>{{$post->user ? $post->user->name : 'Not Found'}}</th>
            <th>{{\Carbon\Carbon::parse($post['created_at'])->format('M-d-Y')}}</th>
            <th class="flex max-w-md">
                <a class="btn btn-info btn-sm" href={{route('posts.view', ['postId' => $post['id']])}}>view</a>
                <a class="btn btn-success btn-sm ml-3" href={{route('posts.edit', ['postId' => $post['id']])}}>edit</a>
                <form class="ml-3"  method="POST" action={{route('posts.delete', ['postId' => $post['id']])}}>
                  @csrf
                  @method('DELETE')
                  <button type="sumbit" class="btn btn-warning btn-sm">Delete</button>
                </form>
            </th>
        </tr>
        @endforeach
      </tbody>
    </table>
            {{-- Pagination --}}
            <div class="flex justify-center items-center mt-10">
              {!! $allPosts->links() !!}
          </div>
  </div>
@endsection