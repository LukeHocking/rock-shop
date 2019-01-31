<?php

namespace RockProduct\Services\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Redirector;
use Illuminate\Support\Facades\Auth;

use RockProduct\Models\Product\Product;

use RockProduct\Http\Requests\Product\ProductRequest;

class ProductService
{
    protected $product;
    
    // Constructor including loading references
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
	
	// CRUD functions
	
	public function index()
	{
		return $this->product->all();
	}
	
    public function store(ProductRequest $request)
	{
        $attributes = $request->all();
        $this->product->create($attributes);
	}
	
	public function update(ProductRequest $request, $id)
	{
        $product = $this->product::find($id);
		$product->fill($request->all());
		
		$result = $product->save();
        if ($result == true) {
            return back()
                ->with(['status' => 'Product Updated Successfully']);
        }
        else {
            return back()
                ->with(['errors' => 'Product could not be updated']);
        }
	}
	
	public function delete($id)
	{
        return $this->product->delete($id);
	}
    
    public function read($id)
    {
        return $this->product->find($id);
    }
}