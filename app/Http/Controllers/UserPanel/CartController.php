<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserPanel\Helper\UserHelper;

class CartController extends Controller
{

    use UserHelper;

    public function index()
    {
        $user = Auth::user();
        $orderitems = [];
        $cart = 0;
        if (Auth::user()) {
            $orderitems = Cart::where('user_id', $user->id)->where('type','purchase')->with('products')->get();
            $cart_id = Cart::where('user_id', $user->id)->where('type','purchase')->with('products')->first();
            $cart = Cart::where('user_id', $user->id)->where('type','purchase')->with('products')->first();
            if ($cart) {
                $cart =  count($cart->products);
            } else {
                $cart = 0;
            }
        }
        if (!is_null($cart_id)) {
            $totalprice = $this->totalprice($cart_id->id);
        } else {
            $totalprice = 0;
        }
        return view("user_panel.cart", compact("cart", "totalprice", "orderitems"));
    }
    public function addproduct($id, $type = "purchase")
    {
        $product = Product::findOrFail($id);

        // Get the current user's ID
        $userId = Auth::user()->id;

        // Find or create a cart for the user

        $cart = Cart::where('user_id', $userId)
            ->where('type',  $type)
            ->first();

        if (!$cart) {
            $cart = new Cart;

            $cart->user_id = $userId;
            $cart->type = $type;
            $cart->save();
        }
        // Check if the product is already in the cart
        $existingCartProduct = $cart->products()->where('product_id', $product->id)->first();

        if ($existingCartProduct) {
            // If the product is already in the cart, increment the quantity
            $existingCartProduct->pivot->increment('quantity');
        } else {
            // If the product is not in the cart, attach it with quantity 1
            $cart->products()->attach($product->id, ['quantity' => 1]);
        }
        $orderitems = Cart::where('user_id', $userId)->where('type', 'purchase')->with('products')->get();
        if (!is_null($cart->id)) {
            $totalprice = $this->totalprice($cart->id);
        } else {
            $totalprice = 0;
        }
        $out = view('website.layouts.minicart', compact('orderitems', 'totalprice'))->render();
        if ($cart) {
            $cart =  count($cart->products);
        } else {
            $cart = 0;
        }
        // Optional: Provide feedback to the user
        return response()->json([
            'message' => "Product '{$product->name}' has been added to your cart.",
            'cart' => $cart,
            'out' => $out
        ]);
    }
    // } 


    public function removefromcart($cartid, $productid)
    {


        $cart = new Cart;
        $userid = auth()->user()->id;
        $orderitems = Cart::where('user_id', $userid)->first();
        $orderitems->products()->detach($productid);
        if ($orderitems->products()->count() == 0) {
            $orderitems->delete();
        }


        $product = Product::findOrFail($productid);
        // dd($product);
        $orderitems = Cart::where('user_id', $userid)->with('products')->get();

        $out = view('website.layouts.minicart', compact('orderitems'))->render();
        if ($cart->products) {
            $cart =  count($cart->products);
        } else {
            $cart = 0;
        }
        // Optional: Provide feedback to the user
        return response()->json([
            'message' => "Product '{$product->name}' removed from your cart.",
            'cart' =>  $cart,
            'out' => $out
        ]);
    }
}
