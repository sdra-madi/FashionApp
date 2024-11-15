<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;
      protected $fillable = [
        'name',
        'classification_id',
      ];
      public function classification():BelongsTo
      {
        return $this->belongsTo(Classification::class);
      }
      public function products():HasMany
      {
        return $this->hasMany(Product::class);
      }
}
