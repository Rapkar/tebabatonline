<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Container\Attributes\Auth;

class CartController extends Controller
{
    public function addproduct($id)
    {
        $product = Product::findOrFail($id);

        // Get the current user's ID
        $userId =  auth()->user()->id;

        // Find or create a cart for the user
        $cart = Cart::firstOrCreate(['user_id' => $userId]);

        // Check if the product is already in the cart
        $existingCartProduct = $cart->products()->where('product_id', $product->id)->first();

        if ($existingCartProduct) {
            // If the product is already in the cart, increment the quantity
            $existingCartProduct->pivot->increment('quantity');
        } else {
            // If the product is not in the cart, attach it with quantity 1
            $cart->products()->attach($product->id, ['quantity' => 1]);
        }
        $orderitems = Cart::where('user_id', $userId)->with('products')->get();
        $out = view('website.layouts.minicart', compact('orderitems'))->render();
        // Optional: Provide feedback to the user
        return response()->json([
            'message' => "Product '{$product->name}' has been added to your cart.",
            'cart' => count($orderitems),
            'out' => $out
        ]);
    }
    // } 


    public function removefromcart( $cartid, $productid)
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
        if($cart->products){
        $cart=  count($cart->products);
        }else{
            $cart=0;
        }
        // Optional: Provide feedback to the user
        return response()->json([
            'message' => "Product '{$product->name}' removed from your cart.",
            'cart' =>  $cart,
            'out' => $out
        ]);
    }
 
}