<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_detail extends Model
{
    use HasFactory;
      protected $fillable = [
        'order_id',
        'product_id',
        'color_id',
        'number_product',
        'price',
      ];

      public function order():BelongsTo
      {
        return $this->belongsTo(Order::class);
      }
      public function product():BelongsTo
      {
        return $this->belongsTo(Product::class);
      }

}