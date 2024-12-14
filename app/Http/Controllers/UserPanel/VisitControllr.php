<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Hekmatinasser\Verta\Verta;
use App\Notifications\VisitNotification;
use App\Models\Cart;
use App\Http\Controllers\UserPanel\Helper\UserHelper;
class VisitControllr extends Controller
{
    use UserHelper;
    public function storevisit()
    {
        $data = json_encode($_POST, JSON_UNESCAPED_UNICODE);
        $Visit =  new Visit;
        $Visit->content = $data;
        // dd($data);
        if ($Visit->save()) {
            auth()->user()->visits()->attach($Visit);
            $medicuserss = User::whereHas('roles', function ($query) {
                $query->whereIn('name', ['Medic', 'Admin']);
            })->get();

            foreach ($medicuserss as $user) {

                $user->notify(new VisitNotification($user, $Visit->id));
            }


            return redirect()->route('forms'); // redirect to the users index page

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
            $result[] = ['data' => json_decode($item->content), 'date' => $formattedDate, 'completed' => $item->completed, 'id' => $item->id];
        }

        return view('user_panel.forms', compact('title', 'products', 'cart', 'orderitems', 'result'));
    }
    public function visit($id)
    {
        $title="نسخه شما";
        $Visit = Visit::find($id);
        $descibtions = $Visit->descibtions;
        $recomendation = $Visit->recommendations;
        $products = $Visit->products;
        // $recommendations=$products->pivot->pivotParent->recommendations;
        $user = Auth::user();
        $orderitems = [];
        $cart = 0;
        if (Auth::user()) {
            $orderitems = Cart::where('user_id', $user->id)->with('products')->get();
            $cart_id = Cart::where('user_id', $user->id)->with('products')->first();
            $cart = Cart::where('user_id', $user->id)->with('products')->first();
            if ($cart) {
                $cart =  count($cart->products);
            } else {
                $cart = 0;
            }
        }
        $totalprice = $this->totalprice($cart_id->id);
   

     
        return view('user_panel.visitdetails', compact('title','products', 'orderitems','totalprice','cart','products'));
    }
}
