<?php

namespace RockShop\Services\Shop;

use Illuminate\Http\Request;
use Illuminate\Http\Redirector;
use Illuminate\Support\Facades\Auth;

use RockShop\Models\Shop\Shop;

use RockShop\Http\Requests\Shop\ShopRequest;

class ShopService
{
    protected $shop;
    
    // Constructor including loading references
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }
	
	// CRUD functions
	
	public function index()
	{
		return $this->shop->all();
	}
	
    public function store(ShopRequest $request)
	{
        $attributes = $request->all();
        $this->shop->create($attributes);
	}
	
	public function update(ShopRequest $request, $id)
	{
        $attributes = $request->all();
        
		$result = $this->shop->update($attributes);
	}
	
	public function delete($id)
	{
        return $this->shop->delete($id);
	}
    
    public function read($id)
    {
        return $this->shop->find($id);
    }
}