<?php

namespace RockShop\Http\Requests\User;
 
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

use RockShop\Models\User\Address;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'street_number'=>'required|integer',
            'street_name'=>'required',
            'city'=>'required',
            'state'=>'required',
            'postal_code'=>'required|integer',
            'phone_number'=>'required|integer',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
