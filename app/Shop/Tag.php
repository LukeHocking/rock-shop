<?php

namespace RockShop\Shop;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name', 
        'weight', 
        'user_id',
    ];
    
    public function user () {
        return $this->belongsTo('RockShop\User');
    }
}
