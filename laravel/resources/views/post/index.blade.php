@extends('layouts.main')
@section('title')Posts @endsection
@section('content')
    <h3 class="text-center">This post page</h3>

    <div>
        <div>
            <a href="{{route('post.create')}}" class="btn btn-outline-dark">Add post</a>
        </div>
        @foreach($posts as $post)
            <div>{{$post->id}}. <a href="{{route('post.show', $post->id)}}"> {{$post->title}}</a></div>
        @endforeach
    </div>
@endsection
