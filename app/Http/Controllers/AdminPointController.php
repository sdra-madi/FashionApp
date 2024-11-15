<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Egulias\EmailValidator\Result\Reason\UnclosedComment;
use Illuminate\Http\Request;

class AdminPointController extends Controller
{
    public function score_points(Request $request)
    {
        $request->validate([
            'cost' =>'required|numeric|min:0',
            'number' =>'required|numeric|min:0'
        ]);
        $point = Point::create([
            'number_of_points' => $request->number,
            'opposite' => $request->cost
        ]);
        return back()->with('message_sent','تم اضافة النقاط بنجاح');
    }
    public function get_points()
    {
        $point=Point::get();
        return view('pages.points',compact('point'));
    }
    public function edit_point()
    {
        $point=Point::get();
        return view('pages.edit_point',compact('point'));
    }
    public function store_points(Request $request)
    {
        $request->validate([
            'cost' =>'required|numeric|min:0',
            'number' =>'required|numeric|min:0'
        ]);
        $point = Point::whereId('1')->update
        ([
            'number_of_points' => $request->number,
            'opposite' => $request->cost
        ]);
        return back()->with('message_sent','تم تعديل النقاط بنجاح');
    }
}
