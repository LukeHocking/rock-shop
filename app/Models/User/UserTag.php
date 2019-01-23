<?php

namespace RockShop\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTag extends Model
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
