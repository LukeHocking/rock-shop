<?php

namespace RockShop\Http\Controllers;

use Illuminate\Http\Request;

use RockShop\Models\Shop\Shop;

class HomeController extends Controller
{
    protected $shop;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->shop = new Shop();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }
    
    public function details()
    {
        return view('user.details');
    }
    
    public function myshops()
    {
        return view('user.myshops');
    }
    
    public function newshop()
    {
        return view('user.newshop');
    }
    
    public function newproduct($id)
    {
        //$this->shop->find($id);
        return view('home');
    }
}
