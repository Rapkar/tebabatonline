<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class home extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $posts = Post::whereHas('categories', function ($query) {
            $query->where('name', 'home');
        })->get();
        return view('website.home', compact('posts'));
    }
    public function articles($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            return abort(404);
        }
        return view('website.single-post', compact('post'));
    }
}
