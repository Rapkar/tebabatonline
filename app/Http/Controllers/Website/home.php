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
       
        $posts = Post::all();
        $posts = Post::whereHas('categories', function ($query) {
            $query->where('name', 'home');
        })->get();
        
        return view('website.home', compact('posts'));
    }
    public function chat()
    {
        $user = Auth::User();
        return view('website.chat',compact('user') );
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
    public function products($slug){

        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            return abort(404);
        }
        $product->increment('count');
        return view('website.single-product', compact('product'));
    }
    public function messages() {
        $messages = Message::with('user')->get()->append('time');

        return response()->json($messages);
    }

    public function message(Request $request) {
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
}
