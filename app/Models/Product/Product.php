<?php

namespace RockShop\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
        'image',
        'weight',
        'category',
        'quantity',
        'price'
    ];
    
    public function shop() {
        return $this->belongsTo("RockShop\Models\Shop\Shop");
    }
    
    public function tags() {
        return $this->hasMany("RockShop\Models\Product\ProductTag");
    }
}
