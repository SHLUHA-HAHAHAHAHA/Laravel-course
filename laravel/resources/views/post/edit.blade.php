@extends('layouts.main')
@section('title')Posts @endsection
@section('content')

   <form action="{{route('post.update', $post->id)}}" method="post">
       @csrf
       @method('patch')
       <div class="mb-3">
           <label for="title" class="form-label">Title</label>
           <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
       </div>
      <div class="mb-3">
           <label for="content" class="form-label">Content</label>
          <textarea type="text" name="content" class="form-control" id="content">{{$post->content}} </textarea>
       </div>
      <div class="mb-3">
           <label for="image" class="form-label">Image</label>
           <input type="text" name="image" class="form-control" id="image" value="{{$post->image}}">
       </div>
       <select class="form-select" name="category_id" aria-label="Default select example">
           @foreach($categories as $category)
               <option
                   {{$category->id === $post->category->id ? 'selected' : ''}}
                   value="{{$category->id}}">{{$category->title}}</option>
           @endforeach
       </select>


       <button type="submit" class="btn btn-primary">Update</button>
   </form>
@endsection
