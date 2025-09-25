@extends('layouts.main')
@section('title')Show posts @endsection
@section('content')
   <h3 class="text-center">This show post page</h3>

    <div>
        <div>{{$post->id}}. {{$post->title}}</div>
        <div>{{$post->content}}</div>
    </div>
   <h5><a href="{{route('post.edit', $post-> id)}}" class="mt-1 btn btn-outline-dark">Edit</a></h5>
   <form action="{{route('post.delete', $post-> id)}}" method="post">
       @csrf
       @method('delete')
           <button type="submit" class="mt-1 btn btn-danger">Delete</button>
    </form>

<h4><a href="{{route('post.index')}}" class="mt-5  btn btn-outline-dark">Back</a></h4>
@endsection
