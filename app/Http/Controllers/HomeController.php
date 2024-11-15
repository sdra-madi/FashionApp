<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function get_classes()
    {
        $classes=Classification::get(['id','name']);
        return response()->json($classes);
    }
    public function get_discounts()
    {
       $discounts=Discount::with(['product','product.photos','product.favorites'])->get();
       return response()->json($discounts);
    }
    public function get_types(Request $request)
    {
        $types=Type::with('classification')->where('classification_id',$request->id)->get();
        return response()->json($types);

    }
}
