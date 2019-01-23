@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

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
                </div>
                
                <h4>{{ Auth::user()->name }}</h4><br>
                
                <a href="{{route('details')}}">User Details</a><br>
                <a href="{{route('myshops')}}">My Shops</a><br>
            </div>
        </div>
    </div>
</div>
@endsection
