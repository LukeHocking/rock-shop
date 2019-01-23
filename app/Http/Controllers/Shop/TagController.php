<?php

namespace RockShop\Http\Controllers\Shop;

use Illuminate\Http\Request;
use RockShop\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

use RockShop\Http\Requests\Shop\TagRequest;
use RockShop\Services\Shop\TagService;

class TagController extends Controller
{
    use SoftDeletes;
    protected $guarded = ['id'];
    
    protected $tag_service;
    
    // Constructor including loading references
    public function __construct(TagService $tag_service)
    {
        $this->tag_service = $tag_service;
    }
    
    // CRUD functions
    
    public function index()
    {
       $posts = $this->v->index();
       return view('index', compact('posts'));
    }
    
    public function store (TagRequest $request)
    {
        $this->tag_service->store($request);
        return back()
            ->with(['status' => 'Tag Created Successfully']);
    }
    
    public function update(TagRequest $request, $id)
    {
        $this->tag_service->update($request, $id);
        return back()
            ->with(['status' => 'Tag Deleted Successfully']);
    }
    
    public function destroy($id)
    {
        $this->tag_service->destroy($id);
        return back()
            ->with(['status' => 'Tag Deleted Successfully']);
    }
    
    public function show($id)
    {
        return redirect()->route('home', ['shop' => Auth::id()]);
    }
}
