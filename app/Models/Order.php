<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
      protected $fillable = [
        'user_id',
        'charge_id',
        'price',
        'date_order',
        'date_charge',
        'payment_type',
        'is_dlivery',
      ];

      public function charge():BelongsTo
    {
        return $this->belongsTo(Charge::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function details():HasMany
    {
        return $this->hasMany(Order_detail::class);
    }


}
