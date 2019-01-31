<?php

namespace RockProduct\Http\Controllers\Product;

use Illuminate\Http\Request;
use RockProduct\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

use RockProduct\Http\Requests\Product\ProductRequest;
use RockProduct\Services\Product\ProductService;

class ProductController extends Controller
{
    use SoftDeletes;
    protected $guarded = ['id'];
    
    protected $product_service;
    
    // Constructor including loading references
    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }
    
    // CRUD functions
    
    public function index()
    {
       $products = $this->v->index();
       return view('index', compact('products'));
    }
    
    public function store (ProductRequest $request)
    {
        $this->product_service->store($request);
        return back()
            ->with(['status' => 'Tag Created Successfully']);
    }
    
    public function update(ProductRequest $request, $id)
    {
        $this->product_service->update($request, $id);
        return back()
            ->with(['status' => 'Tag Created Successfully']);
    }
    
    public function delete($id)
    {
        $this->product_service->delete($id);
        return back()
            ->with(['status' => 'Tag Created Successfully']);
    }
    
    public function show($id)
    {
        $product = $this->product_service->read($id);
        return view('product.edit', ['product' => $product]);
    }
}
