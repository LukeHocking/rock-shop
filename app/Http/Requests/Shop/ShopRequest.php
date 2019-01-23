<?php

namespace RockShop\Http\Requests\Shop;
 
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

use RockShop\Models\Shop\Shop;

class ShopRequest extends FormRequest
{
    /**
     * Determine if the shop is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'description'=>'required',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
