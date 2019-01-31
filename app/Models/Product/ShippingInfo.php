<?php

namespace RockShop\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingInfo extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'address',
        'city',
        'state',
        'postal_code',
        'phone_number',
    ];
    
    public function order() {
        return $this->belongsTo("RockShop\Models\Product\Order");
    }
}
