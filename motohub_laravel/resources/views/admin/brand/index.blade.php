@extends('layouts.app')
@section('title', '- '.trans('messages.brands'))
@section('content')
<div class="container">
    <h1>{{ trans('messages.brands') }}</h1>
    <div class="row">
        <div style="margin-bottom: 20px;">
            <a href="{{ route('admin.brand.create') }}" class="btn btn-primary-app">{{ trans('messages.createBrands') }}</a>
        </div>
        @foreach ($viewData["brands"] as $brand)
        <div class="col-md-4 col-lg-3 mb-2 d-flex align-items-stretch">
            <div class="card d-flex align-items-stretch w-75">
                <div class="card-header">
                    {{$brand->getName()}}
                </div>
                <div class="d-flex justify-content-center"
                    style="height: 100%;width: 100%; overflow: hidden; margin: 0 auto"><img
                        src="{{ asset('images/brands/' . $brand->getLogoImage())}}" class="card-img-top w-75"></div>
                <div class="card-body">
                    <p class="card-text">{{$brand->getDescription()}}</p>
                    <div class="card-buttons">
                        <a href="{{ route('admin.brand.show', ['id'=> $brand->getId()]) }}"
                            class="btn btn-primary-app">{{ trans('messages.show') }}</a>
                        <a href="{{ route('admin.brand.edit', ['id'=> $brand->getId()]) }}"
                            class="btn btn-primary-app">{{ trans('messages.edit') }}</a>
                    </div>
                </div>
                <div class="card-footer text-center text-muted">
                    {{$brand->getFoundationYear()}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
