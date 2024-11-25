<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Product;
use Hekmatinasser\Verta\Verta;

class VisitControllr extends Controller
{
    public function storevisit()
    {
        $data = json_encode($_POST, JSON_UNESCAPED_UNICODE);
        $Visit =  new Visit;
        $Visit->content = $data;
        // dd($data);
        if ($Visit->save()) {
            auth()->user()->visits()->attach($Visit);
            return redirect()->route('forms'); // redirect to the users index page

        } else {
        }
    }
    public function forms()
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
        $cart = count($cart);
        $title = __("user.forms Page");
        $visits = auth()->user()->visits()->get();
        $result = [];
        //   dd($visits);
        foreach ($visits as $item) {
            // dd($item->content);
            $j_date = verta($item->created_at);
            $formattedDate = $j_date->format('Y/m/d H:i:s');
            // or
            $formattedDate = $j_date->formatJalaliDateTime();
            $result[] = ['data' => json_decode($item->content), 'date' => $formattedDate];
        }

        return view('user_panel.forms', compact('title', 'products', 'cart', 'orderitems', 'result'));
    }
}
