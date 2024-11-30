<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\AdminPanel\Message;
use App\Jobs\SendMessage;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\helper;
use App\Models\Comment;
use App\Models\Cart;

class home extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $posts = Post::whereHas('categories', function ($query) {
            $query->where('name', 'home-post');
        })->get();
        $products = Product::whereHas('categories', function ($query) {
            $query->where('name', 'home-product');
        })->get();
        $orderitems = [];
        $cart=0;
        if (Auth::user()) {
            $orderitems = Cart::where('user_id', $user->id)->with('products')->get();
            $cart = Cart::where('user_id', $user->id)->with('products')->first();
            if ($cart) {
                $cart =  count($cart->products);
            } else{
                $cart =0;
            }
        }

        
        $comments = Comment::limit(8)->get();
        return view('website.home', compact('posts', 'products', 'cart', 'orderitems', 'comments'));
    }
    public function chat()
    {
        $user = Auth::User();
        return view('website.chat', compact('user'));
    }
    public function articles($slug)
    {

        $user = Auth::user();

        $posts = Post::whereHas('categories', function ($query) {
            $query->where('name', 'home-post');
        })->get();
        $products = Product::whereHas('categories', function ($query) {
            $query->where('name', 'home-product');
        })->get();
        $cart = session()->get('cart', []);
        $orderitems = [];
        foreach ($cart as $item) {
            $orderitems[] = Product::all()->find($item);
        }
        // $order = Product::whereIn('id', $cart)->get();

        $orderitems = array_unique($orderitems);

        $cart = count($cart);

        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            return abort(404);
        }
        $post->increment('count');
        $comments = $post->comments()->with('user')->get();


        return view('website.single-post', compact('post', 'cart', 'orderitems', 'comments'));
    }
    public function products($slug)
    {
        $cart = session()->get('cart', []);

        $orderitems = [];
        foreach ($cart as $item) {
            $orderitems[] = Product::all()->find($item);
        }
        // $order = Product::whereIn('id', $cart)->get();

        $orderitems = array_unique($orderitems);
        $cart = count($cart);
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            return abort(404);
        }
        $product->increment('count');
        return view('website.single-product', compact('product', 'cart', 'orderitems'));
    }
    public function messages()
    {
        $messages = Message::with('user')->get()->append('time');

        return response()->json($messages);
    }

    public function message(Request $request)
    {
        $message = Message::create([
            'user_id' => auth()->id(),
            'text' => $request->get('text'),
        ]);
        SendMessage::dispatch($message);

        return response()->json([
            'success' => true,
            'message' => "Message created and job dispatched.",
        ]);
    }

    public function visit()
    {
        $user = Auth::user();
        // dd(Auth::user()->hasRole('user'));
        // $posts = Post::all();
        $posts = Post::whereHas('categories', function ($query) {
            $query->where('name', 'home-post');
        })->get();
        $products = Product::all();
        $cart = session()->get('cart', []);
        $orderitems = [];
        foreach ($cart as $item) {
            $orderitems[] = Product::all()->find($item);
        }
        // $order = Product::whereIn('id', $cart)->get();

        $orderitems = array_unique($orderitems);
        // dd($orderitems);
        // foreach($orderitems as $item){
        //     echo $item->slug;
        // }
        $cart = count($cart);
        $helper = new helper;
        $states = $helper->getState();
        // dd($states);
        return view('website.visit', compact('posts', 'products', 'states', 'cart', 'orderitems'));
    }
    public function diseases()
    {
        $user = Auth::user();
        // dd(Auth::user()->hasRole('user'));
        // $posts = Post::all();
        $posts = Post::whereHas('categories', function ($query) {
            $query->where('name', 'home-post');
        })->get();
        $products = Product::all();
        $cart = session()->get('cart', []);
        $orderitems = [];
        foreach ($cart as $item) {
            $orderitems[] = Product::all()->find($item);
        }
        // $order = Product::whereIn('id', $cart)->get();

        $orderitems = array_unique($orderitems);
        // dd($orderitems);
        // foreach($orderitems as $item){
        //     echo $item->slug;
        // }
        $cart = count($cart);
        $helper = new helper;
        $states = $helper->getState();
        return view('website.pages.diseases', compact('posts', 'products', 'states', 'cart', 'orderitems'));
    }
    public function shop()
    {
        $user = Auth::user();
        // dd(Auth::user()->hasRole('user'));
        // $posts = Post::all();
        $posts = Post::whereHas('categories', function ($query) {
            $query->where('name', 'home-post');
        })->get();
        $products = Product::all();
        $cart = session()->get('cart', []);
        $orderitems = [];
        foreach ($cart as $item) {
            $orderitems[] = Product::all()->find($item);
        }
        // $order = Product::whereIn('id', $cart)->get();

        $orderitems = array_unique($orderitems);
        // dd($orderitems);
        // foreach($orderitems as $item){
        //     echo $item->slug;
        // }
        $cart = count($cart);
        $comments = Comment::limit(5)->get();

        return view('website.shop', compact('posts', 'products', 'cart', 'orderitems', 'comments'));
    }
}
