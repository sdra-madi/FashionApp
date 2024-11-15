<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Point;
use Illuminate\Support\Facades\Redis;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{

    public function sing_up(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'location' => $request->location
        ]);
        if ($user) {
            return response()->json(['تم انشاء الحساب', $user->id]);
        }
    }
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $user = $request->user()->id;
        return response()->json(['تم تسجيل الدخول', $user]);
    }
    public function get_info(Request $request)
    {
        $user = User::where('id', $request->id_user)->get();
        return response()->json($user);
    }
    public function get_previous_orders(Request $request)
    {
        $orders = Order::with('details')->where('user_id', $request->id_user)->where('is_dlivery', '1')->get();
        return response()->json($orders);
    }
    public function convert_points(Request $request)
    {
        $value = Point::get();
        $points = User::where('id', $request->id)->get(['number_point', 'balance']);
        $balance = $points[0]->balance;
        $number_point_for_user = $points[0]->number_point;
        $number_of_points = $value[0]->number_of_points;
        $opposite = $value[0]->opposite;
        while ($number_point_for_user >= $number_of_points) {
            $number_point_for_user = $number_point_for_user - $number_of_points;
            $balance = $balance + $opposite;
        }
        $update = User::where('id', $request->id)->update(
            [
                'number_point' => $number_point_for_user,
                'balance' => $balance
            ]
        );
        $user = User::where('id', $request->id)->get(['number_point', 'balance']);
        return response()->json($user);
    }
    public function update_info(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|numeric',
            'location' => 'required|string'
        ]);
        $update = User::where('id', $request->id)->update(
            [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'location' => $request->location
            ]
        );
        $user = User::where('id', $request->id)->get();
        return response()->json($user);
    }
    public function apply_comment(Request $request)
    {
        $orders = Order::where('user_id',$request->user_id)->get();
        if (count($orders) == 0) {
            return response()->json('false');
        }
        else
        {
            foreach ($orders as $order) {
                $order_detail=Order_detail::where('order_id',$order->id)->where('product_id',$request->product_id)->get();
            }
            if(count($order_detail)!==0)
            return response()->json('true');
        }
        return response()->json('false');
    }
}
