<?php

namespace RockShop\Models\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopTag extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'shop_id'
    ];
    
    public function shop() {
        return $this->belongsTo('Models\Shop\Shop');
    }
}
