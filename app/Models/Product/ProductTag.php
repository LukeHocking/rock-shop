<?php

namespace RockShop\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTag extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name'
    ];
    
    public function product() {
        return $this->belongsTo("RockShop\Models\Product\Product");
    }
}
