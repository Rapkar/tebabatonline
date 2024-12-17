<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Product;
use App\Models\Visit;
use App\Models\UserMeta;
use App\Models\Cart;
use App\Http\Controllers\UserPanel\Helper\UserHelper;

class PaymentController extends Controller
{

    use UserHelper;
    public function payment()
    {

        dd('s');
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
        $title = __("medic.Medic Page");
        return view('user_panel.payment.payment', compact('title', 'products', 'cart', 'orderitems'));
    }
    public function medicpayment(Request $request)
    {
        //  Get VISIT ID
        $visit_id = $request->input("visit_id");

        // Get Products from Visit form 
        $visitproducts = Visit::with('products.visitrecommendation')->find($visit_id)->products;

        //  Get VISIT ID
        $user = Auth::user();

        //  Get orderitems for mini cart
        $orderitems = Cart::where('user_id', $user->id)->orWhere('type', 'purchase')->with('products')->get();

        //  SET Type for medic cart
        $type = "medic";
        // Find or create a cart for the user
        $cart = Cart::where('user_id', $user->id)
            ->where('type',  $type)
            ->first();


        // check cart Exist
        if (!$cart) {
            $cart = new Cart;

            $cart->user_id = $user->id;
            $cart->type = $type;
            $cart->save();
        }


        $cart->products()->detach();
        foreach ($visitproducts as $product) {

            $cart->products()->attach($product->id, ['quantity' => $product->pivot->count]);

        }
   

        if (!is_null($cart->id)) {
            $totalprice = $this->totalprice($cart->id);
        } else {
            $totalprice = 0;
        }
        $products=Cart::where('user_id', $user->id)->where('type','medic')->with('products')->get();
        $usermeta = UserMeta::where('user_id', $user->id)->first();
        $cart = count($visitproducts);
        $title = __("medic.Medic Page");
        return view('user_panel.payment.payment', compact('title', 'cart','totalprice', 'visitproducts','usermeta', 'orderitems'));
    }
}
