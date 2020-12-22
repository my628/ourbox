<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::all();
        $categories = Category::all();
        //
        return view('blog.index', compact('posts', 'tags', 'categories'));
    }

    public function show($slug)
    {
        //echo($slug);
        $post = Post::where('id', $slug)->firstOrFail();
        #$post = Post::where('slug', $slug)->firstOrFail();
        #findorFail($slug);
        //echo($post);
        #$tag = $request->get('tag');
        
        /*
        
        if ($tag)
        {
            $tag = Tag::where('tag', $tag)->firstOrFail();
        }
        , compact('post', $post)
        */
        return view('blog.detail', ['post' => $post]);
    }
}