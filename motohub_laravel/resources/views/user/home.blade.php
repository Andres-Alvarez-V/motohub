@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-8 m-auto text-center">
            <h3>Motohub</h3>
            <p class="text-white">
                {{ trans('messages.homeInfo') }}
            </p>
        </div>
    </div>
    <h1 class="text-center mt-5">{{ trans('messages.alliedStore') }}</h1>
    <div class="row mt-3">
        <div class="col-md-10 m-auto">
            <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                <div class="carousel-inner d-sm-flex">
                    @foreach($viewData['products'] as $product)
                        <div class="carousel-item d-sm-block" style="margin-right: 0; flex: 0 0 calc(100%/3);">
                            <div class="card bg-secondary-color-app" style="margin: 0 .5em;">
                                <div class="card-header">
                                    <p class="fw-bold primary-color-app">{{$product['title']}}</p>
                                </div>
                                <div class="card-body text-white">
                                    <p><span class="fw-bold">{{ trans('messages.description') }}:</span> {{ $product['description'] }}</p>
                                    <p><span class="fw-bold">{{ trans('messages.category') }}:</span> {{ $product['category'] }}</p>
                                    <p><span class="fw-bold">{{ trans('messages.price') }}:</span> {{ $product['price'] }}</p>
                                    <p><span class="fw-bold">{{ trans('messages.rating') }}:</span> {{ $product['rating'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-12 m-auto text-center my-2">
            <a href="http://projects-for-me.tech/" target="_blank">
                <button class="btn btn-primary-app">{{ trans('messages.seeMore') }}</button>
            </a>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../../js/app.js"></script>
@endsection
