@extends('layouts.app')
@section('title', 'Brands')
@section('content')
<div class="row">
    @foreach ($viewData["brands"] as $brand)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
            <div class="card-body text-center">
                <p>{{$brand["name"]}}</p>
                <a href="{{ route('brand.show', ['id'=> $brand["id"]]) }}" class="btn bg-primary text-white">Show</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection