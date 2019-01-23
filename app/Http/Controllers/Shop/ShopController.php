<?php

namespace RockShop\Http\Controllers\Shop;

use Illuminate\Http\Request;
use RockShop\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

use RockShop\Http\Requests\Shop\ShopRequest;
use RockShop\Services\Shop\ShopService;

class ShopController extends Controller
{
    use SoftDeletes;
    protected $guarded = ['id'];
    
    protected $shop_service;
    
    // Constructor including loading references
    public function __construct(ShopService $shop_service)
    {
        $this->shop_service = $shop_service;
    }
    
    // CRUD functions
    
    public function index()
    {
       $shops = $this->v->index();
       return view('index', compact('shops'));
    }
    
    public function store (ShopRequest $request)
    {
        $this->shop_service->store($request);
        return redirect()->route('home', ['shop' => Auth::id()])
            ->with(['status' => 'Shop Created Successfully']);
    }
    
    public function update(ShopRequest $request, $id)
    {
        $this->shop_service->update($request, $id);
        return redirect()->route('home', ['shop' => Auth::id()])
            ->with(['status' => 'Shop Updated Successfully']);
    }
    
    public function delete($id)
    {
        $this->shop_service->delete($id);
        return redirect()->route('home', ['shop' => Auth::id()])
            ->with(['status' => 'Shop Deleted Successfully']);
    }
    
    public function show($id)
    {
        $shop = $this->shop_service->read($id);
        return view('user.manageshop', ['shop' => $shop]);
    }
}
