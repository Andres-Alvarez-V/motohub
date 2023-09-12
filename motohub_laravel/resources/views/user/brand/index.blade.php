@extends('layouts.app')
@section('title', 'Brands')
@section('content')
<div class="container">
    <h1>Brands</h1>
    <div class="row">
        @foreach ($viewData["brands"] as $brand)
        <div class="col-md-4 col-lg-3 mb-2 d-flex align-items-stretch">
            <div class="card d-flex align-items-stretch w-75  item-card">
                <div class="card-header">
                    {{$brand["name"]}}
                </div>
                <div class="d-flex justify-content-center item-card-inside"
                    style="height: 100%;width: 100%; overflow: hidden; margin: 0 auto"><img
                        src="{{$brand->getLogoImage()}}" class="card-img-top w-75"></div>
                <div class="card-body item-card-inside">
                    <p class="card-text">{{$brand["description"]}}</p>
                    <a href="{{ route('user.brand.show', ['id'=> $brand->getId()]) }}" class="btn btn-primary">Show</a>
                </div>
                <div class="card-footer text-center text-muted">
                    {{$brand["foundation_year"]}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection