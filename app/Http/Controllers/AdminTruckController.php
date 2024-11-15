<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Chunk;

class AdminTruckController extends Controller
{
   public function get_charges()
   {
    $charges=Charge::get();
    return view('pages.charges',compact('charges'));
   }
   public function edit_charge($id)
   {
       $charge=Charge::whereId($id)->get();
       return view('pages.edit_charge',compact('charge'));
   }
   public function store_charge(Request $request,$id)
   {
       $request->validate([
           'price' =>'required|numeric|min:0',
           'durition' =>'required|numeric|min:3',
           'type'=>'required|string'
       ]);
       $point =Charge::whereId($id)->update
       ([
           'type' => $request->type,
           'durition' => $request->durition,
           'price'=>$request->price
       ]);
       return back()->with('message_sent','تم تعديل نوع الشحن بنجاح');
   }
   public function score_charge(Request $request)
   {
       $request->validate([
           'price' =>'required|numeric|min:0',
           'durition' =>'required|numeric|min:1',
           'type'=>'required|string'
       ]);
       $point =Charge::create([
           'type' => $request->type,
           'durition' => $request->durition,
           'price'=>$request->price
       ]);
       return back()->with('message_sent','تم اضافة نوع شحن جديد بنجاح');
   }
}
