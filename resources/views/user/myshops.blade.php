@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Shops - {{ Auth::user()->name }}</div>

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
                    
                    @foreach (Auth::user()->shops as $shop)
                        <h5>{{$shop->name}}</h5>
                        <p>{{$shop->description}}</p>
                        <form action="{{ route('shop.show', $shop->id) }}" method="GET">
                           @csrf
                           <input type="submit" class="btn btn-primary" value="Manage"/>
                        </form>
                        <br>
                    @endforeach
                    
                    <a href="{{route('newshop')}}">Open New Shop</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
