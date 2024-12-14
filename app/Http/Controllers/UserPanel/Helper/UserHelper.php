<?php

namespace App\Http\Controllers\UserPanel\Helper;

use App\Models\Cart;

trait UserHelper
{
    public function totalprice($cartid, $html = true)
    {
        // Retrieve the cart using the provided cart ID
        $cart = Cart::with('products')->find($cartid);

        // Initialize total price
        $totalPrice = 0;

        // Check if the cart exists and has products
        if ($cart && $cart->products) {
            foreach ($cart->products as $product) {
                // Assuming each product has a 'price' attribute
                $totalPrice += $product->price;
            }
        }
        if ($html == true) {
            $totalPrice =   $totalPrice . ' هزار تومان ';
        } else {
            $totalPrice =   $totalPrice;
        }
        return $totalPrice;
    }
}
