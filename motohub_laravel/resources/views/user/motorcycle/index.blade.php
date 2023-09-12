@extends('layouts.app')
@section('title', 'Motorcycles')
@section('content')
<div class="container">
    <div class="row">
        <h1>Motorcycles</h1>
        @foreach ($viewData["motorcycles"] as $motorcycle)
        <div class="col-md-4 col-lg-3 mb-2 d-flex align-items-stretch">
            <div class="card d-flex align-items-stretch w-75">
                <div class="card-header">
                    {{$motorcycle->getName()}}
                </div>
                <div class="d-flex justify-content-center"
                    style="height: 100%;width: 100%; overflow: hidden; margin: 0 auto"><img
                        src="{{$motorcycle->getImage()}}" class="card-img-top w-75"></div>
                <div class="card-body">
                    <p class="card-text">{{$motorcycle->getDescription()}}</p>
                    <a href="{{ route('user.motorcycle.show', ['id'=> $motorcycle->getId()]) }}"
                        class="btn btn-primary">Show</a>
                </div>
                <div class="card-footer text-center text-muted">
                    {{$motorcycle->getState()}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection