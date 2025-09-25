<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index',compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }
    public function show(Post $post){
        return view('post.show', compact('post'));
    }
     public function edit(Post $post){
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id );
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()-> route('post.index');
    }

    public function delete(){
        $post = Post::find(3);
        $post->delete();
        dd('deleted');
    }
    public function restore(){
        $post = Post::withTrashed()->find(3);
        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate(){
        $anotherPost = [
            'title'=>'some post',
            'content'=>'some content',
            'image'=>'some.png',
            'likes'=>50000,
            'is_published'=>1,
        ];

        $post = Post::firstOrCreate([
            'title'=>'ТЕст some'
        ],[
            'title'=>'ТЕст some',
            'content'=>'some content',
            'image'=>'some.png',
            'likes'=>50000,
            'is_published'=>1,
        ]);
        dump($post->content);
        dd('finished');
    }
    function updateOrCreate()
    {
        $post = Post::find(1);
        $anotherPost = [
            'title'=>'some post',
            'content'=>'some content',
            'image'=>'some.png',
            'likes'=>50000,
            'is_published'=>1,
        ];
        $post = Post::updateOrCreate([
            'title'=>'ТЕст some'
        ],[
            'title'=>'ТЕст some',
            'content'=>'some content',
            'image'=>'some.png',
            'likes'=>50000,
            'is_published'=>1,
        ]);
        dump($post->content);
        dd('finished');
    }
}
