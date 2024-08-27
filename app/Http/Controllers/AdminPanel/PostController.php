<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
            'slug' => ['required', 'string', 'max:255'],
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
        ]);
    }
    public function index(Request $request)
    {
        $posts = Post::all();

        return view('admin_panel.posts.list-post',compact('posts'));
    }
    public function create(Request $request)
    {
        $categories=Category::all();
        return view('admin_panel.posts.create-post',compact('categories'));
    }
    public function store(Request $request)
    {
        $validator = $this->validator($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // S
        $Post = new Post();
        $Post->name = $request->input('name');
        $Post->content = $request->input('content');
        $Post->expert = $request->input('expert');
        $Post->slug = $request->input('slug');
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $url=$request->image->storeAs('images', $imageName);
        
        $Post->image =$url;
        $Post->status = $request->input('status');
        $Post->save();

        // if($request->input('category')){
        //     foreach($request->input('category') as $category){
        //         $category = Category::find($category);
        //         $Post = Post::find($Post->id);
        //         $category->posts()->attach($Post->id);
        //     }
        // }
        if($request->input('category')){
            $categories = $request->input('category');
            $Post = Post::find($Post->id);
            foreach($categories as $category) {
                $category = Category::find($category);
                $Post->categories()->attach($category->id);
            }
        }

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
    public function edit($id){
        $post = Post::all()->find($id);
        $categories=Category::all();
        // $role = Category::all()->find($request->input('role'));
          $cats=$post->categories()->get();
          $ids=[];
          foreach($cats as $cat){
            $ids[]=$cat->id;
          }
        //   dd($ids);
        // dd($posts->name);
         return view('admin_panel.posts.edit-post',compact('post','categories','ids'));
    }
    public function update(Request $request, $id)
    {
        $Post =Post::find($id);
        // if ($request->method() == 'GET') {
        //     #return redirect()->back()->withInput();
        // }
    
        // $validator = $this->validator($request);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        $Post->name = $request->input('name');
        $Post->content = $request->input('content');
        $Post->expert = $request->input('expert');
        $Post->slug = $request->input('slug');
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $url=$request->image->storeAs('images', $imageName);
        
        // $Post->image =$url;
        $Post->status = $request->input('status');
        $Post->save();
      #  $user->address = $request->input('address');
    

    
        return redirect()->route('posts'); // redirect to the users index page
    }
}
