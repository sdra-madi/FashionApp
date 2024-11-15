<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\Relation;
use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Classification extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function types():HasMany
    {
        return $this->hasMany(Type::class);
    }
    public function products_class():HasManyThrough
    {
        return $this->hasManyThrough(Product::class,Type::class);
    }
    public function products_order()
    {
        return $this->hasManyDeep(Order_detail::class,[Type::class,Product::class]);
    }
}
