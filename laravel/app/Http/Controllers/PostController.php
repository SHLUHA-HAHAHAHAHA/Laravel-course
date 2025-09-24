<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', 1)->get();
        foreach ($posts as $post){
            dump($post->title);
        }
    }
    public function create()
    {
        $postsArr = [
            [
                'title'=>'ТЕст',
                'content'=>'тест контент',
                'image'=>'хуй.png',
                'likes'=>40,
                'is_published'=>1,
            ],
            [
                'title'=>'ТЕст2',
                'content'=>'тест контент2',
                'image'=>'хуй2.png',
                'likes'=>42,
                'is_published'=>1,
            ],
            [
                'title'=>'ТЕст3',
                'content'=>'тест контент3',
                'image'=>'хуй3.png',
                'likes'=>43,
                'is_published'=>1,
            ]
        ];
        foreach ($postsArr as $post){
            Post::create($post);
        }
        dd('created');
    }
    public function update()
    {
        $post = Post::find(6);

        $post->update([
            'title'=>'апдейт',
            'content'=>'апдейт',
            'image'=>'апдейт.png',
            'likes'=>999,
            'is_published'=>1,
        ]);
        dd($post);
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
