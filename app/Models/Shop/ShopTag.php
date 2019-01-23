<?php

namespace RockShop\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class ShopTag extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'weight',
        'shop_id',
    ];
    
    function public shop() {
        return $this->belongsTo('Models\Shop\Shop');
    }
}
