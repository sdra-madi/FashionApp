<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Charge;
use App\Models\Classification;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Point;
use App\Models\Product;
use Carbon\Carbon;
use GuzzleHttp\Handler\Proxy;
use Ramsey\Uuid\Type\Integer;

class AdminController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        $total_sale=0;
        $sum=0;
        $or=Product::where('number_pieces','<',20)->count('id');
        $users=User::where('role',0)->count('id');
        $orders = Order::with('user')->get();
        $order=Order::count('id');
        $orders_delivery=Order::where('is_dlivery',1)->count('id');
        $orders_not_delivery=Order::where('is_dlivery',0)->count('id');
        $sale=Order_detail::sum('number_product');
        $num_pro=Product::sum('number_pieces');
        $values=Order_detail::get(['number_product','price']);
        foreach ($values as  $value)
        {
           $sum=$sum+($value->number_product*($value->price));
        }
        $total_sale=number_format(($sale/$num_pro)*100,2);
        $orders_delivery_percent=number_format(($orders_delivery/$order),2);
        $orders_not_delivery_percent=number_format(($orders_not_delivery/$order),2);
        return view('pages.index',  compact('orders','num_pro','total_sale','users',
        'orders_delivery','orders_not_delivery','orders_not_delivery_percent','orders_delivery_percent','sum','or'));
    }
    public function logout()
    {
        return view('pages.login');
    }
    public function index()
    {
        $sum=0;
        $total_sale=0;
        $or=Product::where('number_pieces','<',20)->count('id');
        $users=User::where('role',0)->count('id');
        $orders = Order::with('user')->get();
        $order=Order::count('id');
        $orders_delivery=Order::where('is_dlivery',1)->count('id');
        $orders_not_delivery=Order::where('is_dlivery',0)->count('id');
        $sale=Order_detail::sum('number_product');
        $num_pro=Product::sum('number_pieces');
        $values=Order_detail::get(['number_product','price']);
        foreach ($values as  $value)
        {
           $sum=$sum+($value->number_product*($value->price));
        }
        $total_sale=number_format(($sale/$num_pro)*100,2);
        $orders_delivery_percent=number_format(($orders_delivery/$order),2);
        $orders_not_delivery_percent=number_format(($orders_not_delivery/$order),2);
        return view('pages.index',  compact('orders','num_pro','total_sale','users',
        'orders_delivery','orders_not_delivery','orders_not_delivery_percent','orders_delivery_percent','sum','or'));
    }
    public function analytic()
     {
        $sum=0;
        $sale_mens=0;
        $sale_womens=0;
        $sale_kids=0;
        $total_sale_men=0;
        $total_sale_women=0;
        $total_sale_kids=0;
        $total_sale=0;
        $sale=Order_detail::sum('number_product');
        $num_pro=Product::sum('number_pieces');
        $products=Classification::with('products_class.deatils')->get();
        $products_men=$products[0]->products_class;
        foreach($products_men as $product)
        {
            $i=$product->deatils->where('product_id',!null);
            if(count($i)!==0)
            {
                $sale_mens=$sale_mens+$i[0]->number_product;
            }
        }
        $products_women=$products[1]->products_class;
        foreach($products_women as $product)
        {
            $i=$product->deatils->where('product_id',!null);
            if(count($i)!==0)
            {
                $sale_womens=$sale_womens+$i[0]->number_product;
            }
        }
        $products_kids=$products[2]->products_class;
        foreach($products_kids as $product)
        {
            $i=$product->deatils->where('product_id',!null);
            if(count($i)!==0)
            {
                $sale_kids=$sale_kids+$i[0]->number_product;
            }
        }
        $values=Order_detail::get(['number_product','price']);
        foreach ($values as  $value)
        {
           $sum=$sum+($value->number_product*($value->price));
        }
        $total_sale_men=number_format(($sale_mens/$num_pro)*100,2);
        $total_sale_women=number_format(($sale_womens/$num_pro)*100,2);
        $total_sale_kids=number_format(($sale_kids/$num_pro)*100,2);
        $total_sale=number_format(($sale/$num_pro)*100,2);
        return view('pages.analytic',compact('total_sale','num_pro','total_sale_men','total_sale_women','total_sale_kids','sum'));
    }
}
