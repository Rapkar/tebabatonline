<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    protected function validator( $request)
    {
        $data = $request->all();
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'image' => ['required ', 'string', 'max:255'],
        ]);
    }
    public function index(Request $request)
    {
        $products = Product::all();
        $title=__("admin.Product Page");
        return view('admin_panel.products.list-product',compact('products','title'));
    }
    public function create(Request $request)
    {
        $categories=Category::all();
        $title=__("admin.Product Add");
        return view('admin_panel.products.create-product',compact('categories','title'));
    }
    public function store(Request $request)
    {
        // $validator = $this->validator($request);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        // S
        $Product = new Product();
        $Product->name = $request->input('name');
        $Product->content = $request->input('content');
        $Product->expert = $request->input('expert');
        $Product->slug = $request->input('slug');
        $Product->price = $request->input('price');
        $Product->quantity = $request->input('quantity');
        $Product->discount = $request->input('discount');
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $url=$request->image->storeAs('images', $imageName);
        
        $Product->image =$request->input('image');;
        $Product->status = $request->input('status');
        $Product->save();

        // if($request->input('category')){
        //     foreach($request->input('category') as $category){
        //         $category = Category::find($category);
        //         $Post = Post::find($Post->id);
        //         $category->posts()->attach($Post->id);
        //     }
        // }
        if($request->input('category')){
            $categories = $request->input('category');
            $Product = Product::find($Product->id);
            foreach($categories as $category) {
                $category = Category::find($category);
                $Product->categories()->attach($category->id);
            }
        }

        return redirect()->route('products'); // redirect to the users index page
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
