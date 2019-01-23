<?php

namespace RockShop\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'street_name', 
        'street_number', 
        'city', 
        'state', 
        'postal_code', 
        'phone_number',
        'user_id',
    ];
    
    public function user () {
        return $this->belongsTo('RockShop\User');
    }
}
