@extends('layout.layout')

@section('title') posts @endsection

@section('content')
<div class="overflow-x-auto">
    <table class="table max-w-6xl mx-auto w-full text-xl table-fixed">
      <!-- head -->
      <thead >
        <tr>
          <th>ID</th>
          <th>Name</th>
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
            <th>{{$post['author']}}</th>
            <th>{{$post['createdAt']}}</th>
            <th>
                <a class="btn btn-info btn-sm" href={{route('posts.view', ['postId' => $post['id']])}}>view</a>
                <a class="btn btn-success btn-sm" href={{route('posts.edit', ['postId' => $post['id']])}}>edit</a>
                <a class="btn btn-warning btn-sm" href={{route('posts.delete', ['postId' => $post['id']])}}>delete</a>
            </th>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection