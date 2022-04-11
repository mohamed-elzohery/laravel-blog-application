
@extends('layout.layout')

@section('title')
    {{$post['title']}}
@endsection

@section('content')
    <h1 class="text-6xl">{{$post['title']}}</h1>
    <p class="text-md italic my-3 text-sm">created by <span class="text-content-base ">{{$post['author']}}</span> on {{$post['createdAt']}}</p>
    <p class="text-lg mt-6">{{$post['desc']}}</p>
@endsection