<?php

namespace RockShop\Shop;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];
    
    public function user() {
        return $this->belongsTo('RockShop\User');
    }
    
    public function ratings() {
        return $this->hasMany('RockShop\Shop\Rating');
    }
    
    public function tags() {
        return $this->hasMany('RockShop\Shop\Tag');
    }
}
