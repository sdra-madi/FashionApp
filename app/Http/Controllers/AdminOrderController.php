<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminOrderController extends Controller
{
    public function get_orders()
    {
        $orders=Order::with('user')->get();
        return view('pages.orders',compact('orders'));
    }
    public function get_details_orders($id)
    {
      $details=Order_detail::with(['order','product','product.type','product.photos','order.user','order.charge'])
      ->where('order_id',$id)
      ->get();
     $total=$details[0]->order->price+$details[0]->order->charge->price;
       return view('pages.detail_order',compact(['details','total']));
    }
    public function get_orders_delivery()
    {
        $orders=Order::with('user','charge')->where('is_dlivery','1')->get();
        return view('pages.truck',compact('orders'));
    }
    public function delivery_order($id)
     {
        $date=date_create();
        $order=Order::where('id',$id)->update([ "is_dlivery"=>1,'date_charge'=>$date] );
        return back()->with('message_sent','تم شحن الطلبية بنجاح');
    }
}
