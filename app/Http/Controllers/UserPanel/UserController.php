<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index(){
        $user=Auth::user();
        // dd(Auth::user()->hasRole('user'));
        // $posts = Post::all();
        $posts = Post::whereHas('categories', function ($query) {
            $query->where('name', 'home-post');
        })->get();
        $products = Product::whereHas('categories', function ($query) {
            $query->where('name', 'home-product');
        })->get();
        $cart = session()->get('cart', []);
        $orderitems=[];
        foreach($cart as $item){
            $orderitems[]=Product::all()->find($item);
        }
        // $order = Product::whereIn('id', $cart)->get();
        
        $orderitems=array_unique($orderitems);
        $cart=count($cart);
        $title = __("medic.Medic Page");
        return view('user_panel.dashboard',compact('title', 'products','cart','orderitems'));

    }
    public function cart(){
        $user=Auth::user();
        // dd(Auth::user()->hasRole('user'));
        // $posts = Post::all();
        $posts = Post::whereHas('categories', function ($query) {
            $query->where('name', 'home-post');
        })->get();
        $products = Product::whereHas('categories', function ($query) {
            $query->where('name', 'home-product');
        })->get();
        $cart = session()->get('cart', []);
        $orderitems=[];
        foreach($cart as $item){
            $orderitems[]=Product::all()->find($item);
        }
        // $order = Product::whereIn('id', $cart)->get();
        
        $orderitems=array_unique($orderitems);
        $cart=count($cart);
        $title = __("medic.Medic Page");
        return view('user_panel.cart',compact('title', 'products','cart','orderitems'));

    }
}
