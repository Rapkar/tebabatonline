<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   
    public function index(Request $request)
    {
        $title=__("admin.Order Page");
        $orders = Order::take(10)->get();
        $items = Order::paginate(10);
        return view('admin_panel.posts.list-post',compact('orders','title','items'));
    }
}
