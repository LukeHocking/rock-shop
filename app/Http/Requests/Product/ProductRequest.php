<?php

namespace RockProduct\Http\Requests\Product;
 
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

use RockProduct\Models\Product\Product;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the product is authorized to make this request.
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
            'image' => 'required',
            'weight' => 'required|integer',
            'category' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|float'
            'shop_id' => 'required|exists:shops,id',
        ];
    }
}
