@extends('layouts.app')
@section('title', '- '.$viewData["brand"]->getName())
@section('subtitle', $viewData["brand"]->getName())
@section('content')
<div class="container">
    <h1>
        {{ $viewData["brand"]->getName() }}
    </h1>
    <img class="my-2" style="width: 200px; height: 150px" src="{{ asset('images/brands/' . $viewData["brand"]->getLogoImage())}}" alt="logo">
    <p class="card-text my-2">{{ $viewData["brand"]->getDescription() }}</p>
    <a href="/admin/brands/delete/{{$viewData["brand"]->getId()}}" class="btn text-white my-2 btn-primary-app">Delete</a>
    <div class="row">
        @foreach ($viewData["brand"]->getMotorcycles() as $motorcycle)
        <div class="col-md-4 col-lg-3 mb-2 d-flex align-items-stretch">
            <div class="card d-flex align-items-stretch w-75">
                <div class="card-header">
                    {{$motorcycle->getName()}}
                </div>
                <div class="d-flex justify-content-center"
                    style="height: 100%;width: 100%; overflow: hidden; margin: 0 auto"><img
                        src="{{ asset('images/motorcycles/' . $motorcycle->getImage())}}" class="card-img-top w-75"></div>
                <div class="card-body">
                    <p class="card-text">{{$motorcycle->getDescription()}}</p>
                    <a href="{{ route('admin.motorcycle.show', ['id'=> $motorcycle->getId()]) }}"
                        class="btn btn-primary-app">{{ trans('messages.show') }}</a>
                </div>
                <div class="card-footer text-center text-muted">
                    {{$motorcycle->getModel()}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
