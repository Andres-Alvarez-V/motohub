@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["title"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData["name"] }}
                </h5>
                <img src="{{$viewData['logo_image']}}" alt="" srcset="">
                <p class="card-text">{{ $viewData["description"] }}</p>
                <a href="/brands/delete/{{$viewData["id"]}}" class="btn bg-primary text-white">Delete</a>
                @foreach ($viewData["brand"]->getMotorcycles() as $motorcycle)
                <div class="col-md-4 col-lg-3 mb-2">
                    <div class="card">
                        <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
                        <div class="card-body text-center">
                            <p>{{$motorcycle["model"]}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection