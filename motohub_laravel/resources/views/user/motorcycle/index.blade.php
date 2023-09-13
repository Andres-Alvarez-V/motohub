@extends('layouts.app')
@section('title', '- '.trans('messages.motorcycles'))
@section('content')
<div class="container">
    <div class="row">
        <h1>{{trans('messages.motorcycles')}}</h1>
        @foreach ($viewData["motorcycles"] as $motorcycle)
        <div class="col-md-4 col-lg-3 mb-2 d-flex align-items-stretch">
            <div class="card d-flex align-items-stretch w-75 item-card-app">
                <div class="card-header">
                    {{$motorcycle->getName()}}
                </div>
                <div class="d-flex justify-content-center item-card-inside-app"
                    style="height: 100%;width: 100%; overflow: hidden; margin: 0 auto"><img
                        src="{{ asset('images/motorcycles/' . $motorcycle->getImage())}}" class="card-img-top w-75"></div>
                <div class="card-body item-card-inside-app">
                    <p class="card-text">{{$motorcycle->getDescription()}}</p>
                    <a href="{{ route('user.motorcycle.show', ['id'=> $motorcycle->getId()]) }}"
                        class="btn btn-primary-app">{{trans('messages.show')}}</a>
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
