<?php

namespace RockShop\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'shop_id',
        'rating',
    ];
    
    public function shop() {
        return $this->hasOne('RockShop\Models\Shop\Shop');
    }
    
    public function user() {
        return $this->hasOne('RockShop\User');
    }
}
