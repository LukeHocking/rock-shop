<?php

namespace RockShop\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

use RockShop\Models\Shop\ShopTag;

class TagRequest extends FormRequest
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
            'shop_id' => 'required|exists:shops,id',
        ];
    }
}
