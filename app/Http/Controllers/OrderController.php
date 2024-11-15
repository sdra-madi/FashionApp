<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Color;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {

        // request [id_ph , warehouse_id , all_price , date ,
        // array of (ids of warehouse-detials and quentity)  ]
        // info($request->all());
        if($request->discount=='1')
        {
            $user=User::whereId($request->user_id)->update([
            'balance'=>'0'
            ]);
        }
        $dates = explode("-", $request->date_order); // 8-9-2022 => [8,9,2022]
        info($dates);
        $charge=Charge::where('type',$request->charge_name)->get(['id','durition']);
        $order = Order::create([
            'user_id' => $request->user_id,
            'charge_id' => $charge,
            'date_order' => Carbon::createFromDate($dates[2], $dates[1], $dates[0]),
            'price' => $request->price_order,
        ]);
        $detials = json_decode($request->detials, true);
        foreach ($detials as $detial) {
            $d = Order_detail::create([
                'order_id' => $order->id,
                'product_id' => $detial['product_id'],
                'color_id'=>$detial['color_id'],
                'number_product' => $detial['number_product'],
                'price' => $detial['price']
            ]);
           $color=Color::whereId($detial['color_id'])->get('num_pieces');
           $new_color=Color::whereId($detial['color_id'])->update(
            ['num_pieces'=>((int)$color[0]->num_pieces-(int)$detial['number_product'])]);
           $product=Product::whereId($detial['product_id'])->get(['number_pieces','number_points']);
           Product::whereId($detial['product_id'])->update(['number_pieces'=> ((int)$product[0]->number_pieces -(int)$detial['number_product'])]);
           $new_product=Product::whereId($detial['product_id'])->get('number_pieces');
           if($new_product[0]->number_pieces==0)
            {Product::whereId($detial['product_id'])->update(['hidden'=>'1']);}
            $user=User::whereId($request->user_id)->get('number_point');
            User::whereId($request->user_id)
            ->update(["number_point"=> ((int)$user[0]->number_point+($product[0]->number_points*(int)$detial['number_product']))]);

        }
        return response()->json(['status' => true], 200,$charge[0]->durition);
    }
    public function get_charges()
    {
        $charges=Charge::get();
        return response()->json( $charges);

    }
}
