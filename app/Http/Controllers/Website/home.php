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

class home extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd(Auth::user()->hasRole('user'));
        // $posts = Post::all();
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
        // dd($orderitems);
        // foreach($orderitems as $item){
        //     echo $item->slug;
        // }
        $cart = count($cart);
        return view('website.home', compact('posts', 'products', 'cart', 'orderitems'));
    }
    public function chat()
    {
        $user = Auth::User();
        return view('website.chat', compact('user'));
    }
    public function articles($slug)
    {

        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            return abort(404);
        }
        $post->increment('count');
        return view('website.single-post', compact('post'));
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
        return view('website.single-product', compact('product','cart','orderitems'));
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
    public function addproduct($id)
    {
        // Find the product by ID
        $product = Product::find($id);

        // Check if the product exists
        if ($product) {
            // if (Auth::check()) {
            // Retrieve the current cart from the session or initialize it
            $cart = session()->get('cart', []);

            // Add the product ID to the cart array

            $cart[] = $product->id;
            // Save the updated cart back to the session
            session()->put('cart', $cart);
            $orderitems = [];
            foreach ($cart as $item) {
                $orderitems[$item] = Product::all()->find($item);
            }

            $out = view('website.layouts.minicart', compact('orderitems'))->render();
            // Optional: Provide feedback to the user
            return response()->json([
                'message' => "Product '{$product->name}' has been added to your cart.",
                'cart' => count($cart),
                'out' => $out
            ]);
        } else {
            // Handle the case where the product does not exist
            return response()->json([
                'error' => 'Product not found.',
            ], 404);
        }
        // } 
    }

    function removefromcart($id)
    {
        // Find the product by ID
        $product = Product::find($id);
    
        // Check if the product exists
        if ($product) {
            // Retrieve the current cart from session
            $cart = session()->get('cart', []);
    
            // Check if the product is in the cart
            if (in_array($product->id, $cart)) {
                // Remove the product ID from the cart array
                $cart = array_filter($cart, function($item) use ($product) {
                    return $item !== $product->id;
                });
    
                // Save the updated cart back to the session
                session()->put('cart', $cart);
    
                // Prepare order items for rendering
                $orderitems = [];
                foreach ($cart as $itemId) {
                    $orderitems[$itemId] = Product::find($itemId);
                }
    
                // Render the updated minicart view
                $out = view('website.layouts.minicart', compact('orderitems'))->render();
    
                // Optional: Provide feedback to the user
                return response()->json([
                    'message' => "Product '{$product->name}' removed from your cart.",
                    'cart' => count($cart),
                    'out' => $out
                ]);
            } else {
                // Handle case where product is not in cart
                return response()->json([
                    'error' => "Product '{$product->name}' is not in your cart.",
                ], 404);
            }
        } else {
            // Handle case where product does not exist
            return response()->json([
                'error' => 'Product not found.',
            ], 404);
        }
    }
    
}
