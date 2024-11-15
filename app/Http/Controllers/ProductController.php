<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Psr\Http\Message\ResponseInterface;

class ProductController extends Controller
{
    public function get_products(Request $request)
    {
        $products = Product::with(['sizes', 'sizes.colors', 'photos', 'comments','favorites'])
            ->where('type_id', $request->type_id)->where('hidden', '0')
            ->get();
        return response()->json( $products);
    }
    public function get_detail_product(Request $request)
    {
        $details=Product::with('sizes','comments','photos','sizes.colors','favorites')->where('id',$request->id)->get();
        return response()->json($details);
    }
    public function get_products_fav(Request $request)
    {
        $products = Favorite::with(['product','product.photos'])->distinct()
            ->where('user_id', $request->user_id)->get();
        return response()->json( $products);
    }
    public  function add_product_to_fav(Request $request)
    {
        $favorite = Favorite::where('product_id', $request->product_id)
            ->where('user_id', $request->user_id)
            ->get('id');
        if (count($favorite) !== 0) {
            return response()->json(['status' => 'ok', 'msg' => 'موجود مسبقا بالمفضلة']);
        } else {
            $favorite = Favorite::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id
            ])->save();
            return response()->json(['status' => 'ok', 'msg' => 'تمت اضافته للمفضلة بنجاح']);
        }
    }
    public function delete_product_from_fav(Request $request)
    {
        $favorite = Favorite::where('product_id', $request->product_id)
            ->where('user_id', $request->user_id)
            ->delete();
        if ($favorite) {
            return response()->json(['status' => 'ok', 'msg' => 'تم حذفه من المفضلة بنجاح']);
        }
    }

    public function search_product(Request $request)
    {
        $products = Type::with('products','products.sizes','products.sizes.colors')->where('name','LIKE','%'.$request->name.'%')->get();
             if(count($products)==0)
             {
           $products=Classification::with('products_class','products_class.sizes','products_class.sizes.colors')->where('name','LIKE','%'.$request->name.'%')->get();
             }
           return response()->json($products);
    }
    public function add_comment(Request $request)
    {
        $comment=Comment::create([
            'user_id'=>$request->user_id,
            'product_id'=> $request->product_id,
            'text'=>$request->text,
            'number_stars'=>$request->number_stars
        ]);
        if($comment)
        return response()->json($comment);
    }
    public function get_comments(Request $request)
    {
        $comments=Comment::with('user')->where('product_id',$request->product_id)->get();
        return Response()->json($comments);
    }
}
