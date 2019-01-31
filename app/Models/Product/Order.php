<?php

namespace RockShop\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'date_shipped',
        'quantity',
        'status',
    ];
    
    public function shop() {
        return $this->belongsTo("RockShop\Models\Shop\Shop");
    }
    
    public function user() {
        return $this->belongsTo("RockShop\User");
    }
    
    public function product() {
        return $this->belongsTo("RockShop\Models\Product\Product");
    }
    
    public function shippingInfo() {
        return $this->hasOne("RockShop\Models\Product\ShippingInfo");
    }
}
