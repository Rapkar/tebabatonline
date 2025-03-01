<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\Option;
use Illuminate\Contracts\View\View;

class OrderController extends Controller
{
    public $logoimg;
    public function __construct()
    {
        $this->logoimg = Option::where('key', '=', 'logoimg')->value('value');
        view()->share([
            'logourl' =>  $this->logoimg
        ]);
    }
    public function index(Request $request)
    {
        $title = __("admin.Order Page");
        $orders = Order::take(10)->get();
        $items = Order::paginate(10);
        return view('admin_panel.orders.list-order', compact('orders', 'title', 'items'));
    }
    public function edit(int $id)
    {
        $title = __("admin.Order Page");
        $orders =  OrderProduct::where("order_id", "=", $id)->get();
        $order =  Order::find($id);
        // dd($order);


        return view('admin_panel.orders.edit-order', compact('orders', 'order', 'title'));
    }
    public function update(Request $request,$id)
    {
        $title = __("admin.Order Page");
        $order =  Order::find($id);
        // dd($order);
        $order->status=$request->input("status");
        $order->update();

        return  redirect()->back()->with("success");
    }
    public function chart()
    {
        $title = __("admin.Order Page");

        return view('admin_panel.orders.chart-order', compact( 'title'));

    }
}
