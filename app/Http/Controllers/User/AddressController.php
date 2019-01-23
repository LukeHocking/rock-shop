<?php

namespace RockShop\Http\Controllers\User;

use Illuminate\Http\Request;
use RockShop\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

use RockShop\Http\Requests\User\AddressRequest;
use RockShop\Services\User\AddressService;

class AddressController extends Controller
{
    use SoftDeletes;
    protected $guarded = ['id'];
    
    protected $address_service;
    
    // Constructor including loading references
    public function __construct(AddressService $address_service)
    {
        $this->address_service = $address_service;
    }
    
    // CRUD functions
    
    public function index()
    {
       $posts = $this->v->index();
       return view('index', compact('posts'));
    }
    
    public function store (AddressRequest $request)
    {
        $this->address_service->store($request);
        return redirect()->route('home', ['user' => Auth::id()])
            ->with(['status' => 'Address Created Successfully']);
    }
    
    public function update(AddressRequest $request, $id)
    {
        $this->address_service->update($request, $id);
        return redirect()->route('home', ['user' => Auth::id()])
            ->with(['status' => 'Address Created Successfully']);
    }
    
    public function delete($id)
    {
        $this->address_service->delete($id);
        return redirect()->route('home', ['user' => Auth::id()])
            ->with(['status' => 'Address Created Successfully']);
    }
}
