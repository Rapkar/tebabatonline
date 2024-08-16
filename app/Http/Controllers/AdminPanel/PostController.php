<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('admin_panel.posts.list-post');
    }
    public function create(Request $request)
    {
        return view('admin_panel.posts.create-post');
    }
}
