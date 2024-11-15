<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Charge extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'price',
        'durition',
      ];

      public function orders():HasMany
      {
        return $this->hasMany(Order::class);
      }
}
