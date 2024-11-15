<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Color;
use App\Models\Discount;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function get_men_products()
    {
        $types = Type::with('classification')->where('classification_id', '1')->get();
        $class = Classification::with('products_class','products_class.photos')->where('id','1')->get();
        $products_men = $class[0]->products_class->where('hidden','0');
        return view('pages.man', compact('types', 'products_men'));
    }
    public function get_women_products()
    {
        $types = Type::with('classification')->where('classification_id', '2')->get();
        $class = Classification::with('products_class','products_class.photos')->where('id','2')->get();
        $products_women = $class[0]->products_class->where('hidden','0');
        return view('pages.women', compact('types', 'products_women'));
    }

    public function get_kids_products()
    {
        $types = Type::with('classification')->where('classification_id', '3')->get();
        $class = Classification::with('products_class','products_class.photos')->where('id','3')->get();
        $products_kids = $class[0]->products_class->where('hidden','0');
        return view('pages.kids', compact('types', 'products_kids'));
    }
    public function get_type_products($type_id)
    {
        $type = Type::with('products','products.photos')->where('id',$type_id)->get();
        $types = Type::with('classification')->where('classification_id',$type[0]->classification_id)->get();
        $products=$type[0]->products->where('hidden','0');
       //dd($types);
        return view('pages.types', compact( 'types','products'));
    }

    public function get_discounts_products()
    {
        $discounts = Discount::with('product','product.photos')->get();
        return view('pages.discounts', compact( 'discounts'));
    }

    public function get_detail_product($id)
    {
        $details = Product::with('sizes', 'sizes.colors', 'photos', 'type', 'type.classification','discounts')->where('id', $id)->get();
         return view('pages.detail_product', compact('details'));
    }
    public function register_product(Request $request)
    {

        $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'price'=>'required|numeric|min:1',
            'number_points'=>'required|numeric|min:1',
            'class'=>'required|string',
            'type'=>'required|string',
            'img1'=>'required|image',
            'img2'=>'required|image',
            'img3'=>'required|image',
            'img4'=>'required|image',
            // 'color11'=>'string',
            // 'num11'=>'integer|min:1',
            // 'num21'=>'integer|min:1',
            // 'num31'=>'integer|min:1',
            // 'num41'=>'integer|min:1',
            // 'num12'=>'integer|min:1',
            // 'num22'=>'integer|min:1',
            // 'num32'=>'integer|min:1',
            // 'num42'=>'integer|min:1',
            // 'num13'=>'integer|min:1',
            // 'num23'=>'integer|min:1',
            // 'num33'=>'integer|min:1',
            // 'num43'=>'integer|min:1',

        ]);
        $class = Classification::where('name', $request->class)->get('id');
        $class_id = $class[0]->id;
        $type = Type::where('name',$request->type)->where('classification_id', $class_id)->get('id');
        if (count($type) == 0) {
            $new_type = Type::create(
                [
                    'classification_id' => $class_id,
                    'name' => $request->type
                ]
            );
            $type_id = $new_type->id;
        } else {
            $type_id = $type[0]->id;
        }
        $product=Product::create([
            'type_id'=>$type_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'number_points'=>$request->number_points,
            'number_pieces'=>$request->num11+$request->num21+$request->num31+$request->num41+$request->num12+$request->num22+$request->num32+$request->num42+
            $request->num13+$request->num23+$request->num33+$request->num43
        ]);
        $product_id=$product->id;
        if($request->size1 !==null)
        {
            $size1=Size::create([
                'product_id'=>$product_id,
                'title'=>$request->size1
              ]);
            if($request->color11 !==null)
            {
             $color=Color::create([
                'size_id'=>$size1->id,
                'color'=>$request->color11,
                'num_pieces'=>$request->num11
             ]);
            }
            if($request->color21 !==null)
            {
             $color=Color::create([
                'size_id'=>$size1->id,
                'color'=>$request->color21,
                'num_pieces'=>$request->num21
             ]);
            }
            if($request->color31 !==null)
            {
             $color=Color::create([
                'size_id'=>$size1->id,
                'color'=>$request->color31,
                'num_pieces'=>$request->num31
             ]);
            }
            if($request->color41 !==null)
            {
             $color=Color::create([
                'size_id'=>$size1->id,
                'color'=>$request->color41,
                'num_pieces'=>$request->num41
             ]);
            }
        }
        if($request->size2!==null)
        {
            $size2=Size::create([
                'product_id'=>$product_id,
                'title'=>$request->size2
              ]);
            if($request->color12!==null)
            {
             $color=Color::create([
                'size_id'=>$size2->id,
                'color'=>$request->color12,
                'num_pieces'=>$request->num12
             ]);
            }
            if($request->color22!==null)
            {
             $color=Color::create([
                'size_id'=>$size2->id,
                'color'=>$request->color22,
                'num_pieces'=>$request->num22
             ]);
            }
            if($request->color32!==null)
            {
             $color=Color::create([
                'size_id'=>$size2->id,
                'color'=>$request->color32,
                'num_pieces'=>$request->num32
             ]);
            }
            if($request->color42!==null)
            {
             $color=Color::create([
                'size_id'=>$size2->id,
                'color'=>$request->color42,
                'num_pieces'=>$request->num42
             ]);
            }
        }
        if($request->size3!==null)
        {
            $size3=Size::create([
                'product_id'=>$product_id,
                'title'=>$request->size3
              ]);
            if($request->color13!==null)
            {
             $color=Color::create([
                'size_id'=>$size3->id,
                'color'=>$request->color13,
                'num_pieces'=>$request->num13
             ]);
            }
            if($request->color23!==null)
            {
             $color=Color::create([
                'size_id'=>$size3->id,
                'color'=>$request->color23,
                'num_pieces'=>$request->num23
             ]);
            }
            if($request->color33!==null)
            {
             $color=Color::create([
                'size_id'=>$size3->id,
                'color'=>$request->color33,
                'num_pieces'=>$request->num33
             ]);
            }
            if($request->color43!==null)
            {
             $color=Color::create([
                'size_id'=>$size3->id,
                'color'=>$request->color43,
                'num_pieces'=>$request->num43
             ]);
            }
        }
        if ($request->hasFile('img1')) {
            $photo = $request->file('img1');
            $name = $photo->getClientOriginalName();
            $path = 'images';
            $photo->move($path, $name);
            $img = Photo::create([
                'product_id' => $product_id,
                'img' =>'http://sdramadi-001-site1.atempurl.com/images/'.$name
            ]);
        }
        if ($request->hasFile('img2')) {
            $photo = $request->file('img2');
            $name = $photo->getClientOriginalName();
            $path = 'images';
            $photo->move($path, $name);
            $img = Photo::create([
                'product_id' => $product_id,
                'img' =>'http://sdramadi-001-site1.atempurl.com/images/'.$name
            ]);
        }
        if ($request->hasFile('img3')) {
            $photo = $request->file('img3');
            $name = $photo->getClientOriginalName();
            $path = 'images';
            $photo->move($path, $name);
            $img = Photo::create([
                'product_id' => $product_id,
                'img' =>'http://sdramadi-001-site1.atempurl.com/images/'.$name
            ]);
        }
        if ($request->hasFile('img4')) {
            $photo = $request->file('img4');
            $name = $photo->getClientOriginalName();
            $path = 'images';
            $photo->move($path, $name);
            $img = Photo::create([
                'product_id' => $product_id,
                'img' =>'http://sdramadi-001-site1.atempurl.com/images/'.$name
            ]);
        }
         return back()->with('message_sent', 'تمت اضافة المنتج بنجاح');

    }
    public function hide_product($id)
    {
        Product::whereId($id)->update(['hidden'=>1]);
        return back()->with('message_sent', 'تمت اخفاء المنتج بنجاح');
    }
    public function add_discount($id)
    {
        $product=Product::with('photos')->whereId($id)->get();
        return view('pages.add_discount',compact('product'));
    }
    public function store_discount(Request $request,$id)
    {
        $request->validate([
            "value"=>"required|numeric|min:0|max:99",
            "duration"=>"required|string"
        ]);
        $discount=Discount::create(
            [
                'product_id'=>$id,
                'value'=>$request->value,
                'duration'=>$request->duration
            ]
        );
        return back()->with('message_sent','تم اضافة الحسم لهذا المنتج بنجاح');
    }
    public function edit_product($id)
    {
        $details = Product::with('sizes', 'sizes.colors')->where('id', $id)->get();
         return view('pages.edit_product', compact('details'));
    }
    public function store_product(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'price'=>'required|numeric|min:1',
            'number_points'=>'required|numeric|min:1',
        ]);
        $total_num=count($request->num);
        $number_pieces=0;
        for($i=0;$i<$total_num;$i++)
        {
            $number_pieces= $number_pieces+$request->num[$i];
        }
        $product = Product::whereId($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'number_points'=>$request->number_points,
            'number_pieces'=>$number_pieces
        ]);
        $s=0;
        $c=0;
        $total_size=count($request->size);
        $total_color=count($request->color);
        $pro=Product::with(['sizes','sizes.colors'])->whereId($id)->get();
        foreach($request->size as $size)
        {
                $new_size=Size::whereId($pro[0]->sizes[$s]->id)->update([
                    'title' => $size
                ]);
                foreach($pro[0]->sizes[$s]->colors as $color)
                {
                        $new_color=Color::whereId($color->id)->update([
                            'color' => $request->color[$c],
                            'num_pieces'=>$request->num[$c]
                        ]);
                        if($c<$total_color){$c++;}
                }
                if($s<$total_size){$s++;}
        }
         return back()->with('message_sent','تم تعديل المنتج بنجاح');
    }

}
