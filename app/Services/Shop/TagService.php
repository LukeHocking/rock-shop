<?php

namespace RockShop\Services\Shop;

use Illuminate\Http\Request;
use Illuminate\Http\Redirector;
use Illuminate\Support\Facades\Auth;

use RockShop\Models\Shop\ShopTag;

use RockShop\Http\Requests\Shop\TagRequest;

class TagService
{
    protected $tag;
    
    // Constructor including loading references
    public function __construct(ShopTag $tag)
    {
        $this->tag = $tag;
    }
	
	// CRUD functions
	
	public function index()
	{
		return $this->tag->all();
	}
	
    public function store(TagRequest $request)
	{
        $attributes = $request->all();
        $this->tag->create($attributes);
	}
	
	public function update(TagRequest $request, $id)
	{
        $attributes = $request->all();
        
		$result = $this->tag->update($attributes);
	}
	
	public function destroy($id)
	{
        return $this->tag->destroy($id);
	}
}