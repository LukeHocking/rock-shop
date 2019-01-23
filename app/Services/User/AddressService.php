<?php

namespace RockShop\Services\User;

use Illuminate\Http\Request;
use Illuminate\Http\Redirector;
use Illuminate\Support\Facades\Auth;

use RockShop\Models\User\Address;

use RockShop\Http\Requests\User\AddressRequest;

class AddressService
{
    protected $address;
    
    // Constructor including loading references
    public function __construct(Address $address)
    {
        $this->address = $address;
    }
	
	// CRUD functions
	
	public function index()
	{
		return $this->address->all();
	}
	
    public function store(AddressRequest $request)
	{
        $attributes = $request->all();
        $this->address->create($attributes);
	}
	
	public function update(AddressRequest $request, $id)
	{
        $attributes = $request->all();
        
		$result = $this->address->update($attributes);
	}
	
	public function delete($id)
	{
        return $this->address->delete($id);
	}
}