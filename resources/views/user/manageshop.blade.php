@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage Shop {{$shop->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!empty($errors->first()))
                        <div class="row col-lg-12">
                            <div class="alert alert-danger">
                                <span>{{ $errors->first() }}</span>
                            </div>
                        </div>
                    @endif
                    
                    <h4>Shop Details</h4>
                    <form method="POST" action="{{ route('shop.update', $shop->id) }}">
                        {{method_field('PUT')}}
                        @csrf
                        <input type='hidden' name='user_id' value='{{Auth::id()}}'>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                @if (isset(Auth::user()->address))
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$shop->name}}" required autofocus>
                                @else
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @endif
                                
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                @if (isset(Auth::user()->address))
                                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{$shop->description}}" required>
                                @else 
                                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required>
                                @endif 
                                
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <h4>Current Shop Tags</h4>
                    @foreach ($shop->tags as $tag)
                        Name: {{$tag->name}}, Weight: {{$tag->weight}}
                        <form action="{{ route('shoptag.destroy', $tag->id) }}" method="POST">
                           {{method_field('DELETE')}}
                           @csrf
                           <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                        <br>
                    @endforeach
                    Add New Tag:
                    <form method="POST" action="{{ route('shoptag.store') }}">
                        @csrf
                        <input type='hidden' name='shop_id' value='{{$shop->id}}'>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
