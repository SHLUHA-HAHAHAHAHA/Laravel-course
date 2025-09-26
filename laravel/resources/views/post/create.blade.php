@extends('layouts.main')
@section('title')Post create @endsection
@section('content')

   <form action="{{route('post.store')}}" method="post">
       @csrf
       <div class="mb-3">
           <label for="title" class="form-label">Title</label>
           <input type="text" name="title" class="form-control" id="title">
       </div>
      <div class="mb-3">
           <label for="content" class="form-label">Content</label>
          <textarea type="text" name="content" class="form-control" id="content"> </textarea>
       </div>
      <div class="mb-3">
           <label for="image" class="form-label">Image</label>
           <input type="text" name="image" class="form-control" id="image">
       </div>
       <label for="categories" class="form-label">Select category</label>
       <select class="form-select" id="categories" name="category_id">
           <option selected>Open this select menu</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
       </select>
       <label for="tags" class="form-label">Select tag</label>
       <select multiple class="form-select" id="tags" name="tags[]">
           @foreach($tags as $tag)
               <option value="{{$tag->id}}">{{$tag->title}}</option>
           @endforeach
       </select>

       <button type="submit" class="btn btn-primary mt-4">Create</button>
   </form>
@endsection
