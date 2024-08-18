<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    protected function validator( $request)
    {
        $data = $request->all();
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
        ]);
    }
    public function index(Request $request)
    {
        $posts = Post::all();
        return view('admin_panel.posts.list-post',compact('posts'));
    }
    public function create(Request $request)
    {
        return view('admin_panel.posts.create-post');
    }
    public function store(Request $request)
    {

        // S
        $Post = new Post();
        $Post->name = $request->input('name');
        $Post->content = $request->input('content');
        $Post->image = $request->input('image');
        $Post->status = $request->input('status');
        $Post->save();

        return redirect()->route('posts'); // redirect to the users index page
    }
    public function delete($id)
    {
        $Post = Post::find($id);
        if ($Post) {
            $Post->delete();
            return redirect()->route('posts');
        } else {
            // handle error
        }
    }
}
