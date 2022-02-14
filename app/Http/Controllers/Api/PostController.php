<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with(['category', 'tags'])->paginate(5);
        $tags = Tag::all();
        $categories = Category::all();

        return response()->json(compact('posts', 'tags', 'categories'));
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        if(!$post){
            $post = ['title'=>'Post non trovato', 'content' => ''];
        }

        return response()->json($post);

    }
}
