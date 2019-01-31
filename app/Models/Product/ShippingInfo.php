<?php

namespace RockShop\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingInfo extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'post_type',
        'street_name', 
        'street_number', 
        'city', 
        'state', 
        'postal_code', 
        'phone_number',
        'user_id',
    ];
    
    public function order () {
        return $this->belongsTo('RockShop\Models\Product\Order');
    }
}
