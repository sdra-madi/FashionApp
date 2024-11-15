<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Znck\Eloquent\Relations\BelongsToThrough as RelationsBelongsToThrough;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_id',
        'name',
        'description',
        'price',
        'number_points',
        'number_pieces',
        'hidden',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
    public function class(): RelationsBelongsToThrough
    {
        return $this->BelongsToThrough(Classification::class, Type::class);
    }
    public function sizes(): HasMany
    {
        return $this->hasMany(Size::class);
    }

    public function deatils(): HasMany
    {
        return $this->hasMany(Order_detail::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }
    public function discounts(): HasMany
    {
        return $this->hasMany(Discount::class);
    }
}
