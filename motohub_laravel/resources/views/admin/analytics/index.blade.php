@extends('layouts.app')
@section('title', '- '.$viewData["title"])
@section('subtitle', $viewData["title"])
@section('content')
<div class="container">
    <h1>
        {{ $viewData["title"] }}
    </h1>

    <div>
        <h2 class="d-flex justify-content-center">{{ trans('messages.analyticsMotorcycleTitle') }}</h2>
        <div class="row">
            <div class="col">
                <h3 class="d-flex justify-content-center">{{ trans('messages.analyticsMostSelled') }}</h3>
                <ul class="list-group list-group-numbered">
                @foreach ($viewData["topSellingMotorcycles"] as $iterator)
                    <li class="list-group-item d-flex justify-content-center body-app">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $iterator->getMotorcycle()->getImage())}}" class="card-img-top" alt="{{  $iterator->getMotorcycle()->getDescription() }}">
                            <div class="card-body bg-color-secondary-app text-white">
                                <p class="card-text"><b>{{ trans('messages.analyticsItemName') }}: </b>{{$iterator->getMotorcycle()->getName()}}</p>
                                <p class="card-text"><b>{{ trans('messages.analyticsItemCategory')}}: </b>{{$iterator->getMotorcycle()->getCategory()}}</p>
                                <p class="card-text"><b>{{ trans('messages.analyticsItemBrand')}}: </b>{{$iterator->getMotorcycle()->getBrand()->getName()}}</p>
                                <p class="card-text"><b>{{ trans('messages.analyticsItemModel')}}: </b>{{$iterator->getMotorcycle()->getModel()}}</p>
                                <p class="card-text"><b>{{ trans('messages.analyticsItemSoldQuantity')}}: </b> {{$iterator["sold_units"]}}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>
            <div class="col">
                <h3 class="col d-flex justify-content-center">{{ trans('messages.analyticsLessSelled') }} </h3>
                <ul class="list-group list-group-numbered">
                    @foreach ($viewData["lowestSellingMotorcycles"] as $iterator)
                        <li class="list-group-item d-flex justify-content-center body-app">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('storage/' . $iterator->getMotorcycle()->getImage())}}" class="card-img-top" alt="{{  $iterator->getMotorcycle()->getDescription() }}">
                                <div class="card-body bg-color-secondary-app text-white">
                                    <p class="card-text"><b>{{ trans('messages.analyticsItemName') }}: </b>{{$iterator->getMotorcycle()->getName()}}</p>
                                    <p class="card-text"><b>{{ trans('messages.analyticsItemCategory')}}: </b>{{$iterator->getMotorcycle()->getCategory()}}</p>
                                    <p class="card-text"><b>{{ trans('messages.analyticsItemBrand')}}: </b>{{$iterator->getMotorcycle()->getBrand()->getName()}}</p>
                                    <p class="card-text"><b>{{ trans('messages.analyticsItemModel')}}: </b>{{$iterator->getMotorcycle()->getModel()}}</p>
                                    <p class="card-text"><b>{{ trans('messages.analyticsItemSoldQuantity')}}: </b> {{$iterator["sold_units"]}}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
    <div>
        <h2 class="d-flex justify-content-center">{{ trans('messages.analyticsBrandTitle') }}</h2>
        <div class="row">
            <div class="col">
                <h3 class="d-flex justify-content-center">{{ trans('messages.analyticsMostSelled') }}</h3>
                <ul class="list-group list-group-numbered">
                @foreach ($viewData["topSellingBrands"] as $brand )
                    <li class="list-group-item d-flex justify-content-center body-app">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $brand->getLogoImage())}}" class="card-img-top" alt="{{  $brand->getDescription() }}">
                            <div class="card-body bg-color-secondary-app text-white">
                                <p class="card-text"><b>{{ trans('messages.analyticsItemName') }}: </b>{{$brand->getName()}}</p>
                                <p class="card-text"><b>{{ trans('messages.analyticsItemSoldQuantity')}}: </b> {{$brand["total_sold"]}}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>
            <div class="col">
                <h3 class="col d-flex justify-content-center">{{ trans('messages.analyticsLessSelled') }} </h3>
                <ul class="list-group list-group-numbered">
                    @foreach ($viewData["topSellingBrands"] as $brand )
                        <li class="list-group-item d-flex justify-content-center body-app">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('storage/' . $brand->getLogoImage())}}" class="card-img-top" alt="{{  $brand->getDescription() }}">
                                <div class="card-body bg-color-secondary-app text-white">
                                    <p class="card-text"><b>{{ trans('messages.analyticsItemName') }}: </b>{{$brand->getName()}}</p>
                                    <p class="card-text"><b>{{ trans('messages.analyticsItemSoldQuantity')}}: </b> {{$brand["total_sold"]}}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection
