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
}
