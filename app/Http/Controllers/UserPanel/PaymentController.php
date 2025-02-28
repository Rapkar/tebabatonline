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
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    use UserHelper;
    public function payment(Request $request)
    {
        // $user = Auth::user();
        // $cart = Cart::where('user_id', $user->id)->where('type','purchase')->with('products')->first();
        // foreach ($cart->products as $product) {
        //     dd($product->pivot->quantity,$product->id);
        //     }
        // Start a database transaction to ensure data consistency
        DB::beginTransaction();

        try {
            // Retrieve the authenticated user's cart
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->where('type','purchase')->with('products')->first();
            // Assuming you have a relationship defined between User and Cart
      
            // Create a new order
            $order = new Order;
            $order->user_id = $user->id;
            $order->total_amount = 0; // Initialize total amount to 0
            $order->payment_method = "direct";
            $order->shipping_address = "address"; // You can customize this based on the request
            $order->status = "pending";
            $order->save();

            $totalAmount = 0;
            // Retrieve cart items and transfer them to order items
            foreach ($cart->products as $product) {
                // Create a new order item
                $orderProduct = new OrderProduct;
                $orderProduct->order_id = $order->id;
                $orderProduct->product_id = $product->id;
                $orderProduct->quantity = $product->pivot->quantity;
                $orderProduct->price = $product->price; // Assuming the product price is stored in the Product model
                $orderProduct->save();

                // Update the total amount of the order
                $totalAmount += $product->quantity * $product->price;
            }

            // Update the order's total amount
            $order->total_amount = $totalAmount;
            $order->save();

            // Clear the cart after the order is created
            $cart->delete();

            // Commit the transaction
            DB::commit();

            // Return a success response or redirect
            return response()->json(['message' => 'Order created successfully'], 200);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Return an error response
            return response()->json(['message' => 'Failed to create order', 'error' => $e->getMessage()], 500);
        }
    }
    public function medicpayment(Request $request)
    {
        dd('s');
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
        $products = Cart::where('user_id', $user->id)->where('type', 'medic')->with('products')->get();
        $usermeta = UserMeta::where('user_id', $user->id)->first();
        $cart = count($visitproducts);
        $title = __("medic.Medic Page");
        return view('user_panel.payment.payment', compact('title', 'cart', 'totalprice', 'visitproducts', 'usermeta', 'orderitems'));
    }
}
