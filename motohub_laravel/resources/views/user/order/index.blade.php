@extends('layouts.app')
@section('title', '- ' . trans('messages.orderTitle'))
@section('content')
<div class="container">
    @if($errors->any())
        <ul id="errors" class="alert alert-danger list-unstyled mt-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif

    <h1 class="my-3 text-center">{{ trans('messages.shoppingCart') }}</h1>

    <div class="row">
        @foreach($viewData["orderItems"] as $key => $orderItem)
            <div class="row w-75 mb-3 m-auto">
                <div class="card col-md-3 col-sm-12 bg-secondary-color-app" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                    <div class="m-auto w-100" style="height: 200px;" >
                        <img class="w-100 h-100 object-fit-scale" src="{{ URL::asset('storage/' . $orderItem["motorcycle"]->getImage()) }}">
                    </div>
                </div>

                <div class="card col-md-9 col-sm-12 bg-secondary-color-app" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                    <div class="card-body">
                        <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.name') }}: </span>{{$orderItem["motorcycle"]->getName()}}</p>
                        <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.category') }}: </span>{{$orderItem["motorcycle"]->getCategory()}}</p>
                        <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.model') }}: </span>{{$orderItem["motorcycle"]->getModel()}}</p>
                        <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.description') }}: </span>{{$orderItem["motorcycle"]->getDescription()}}</p>
                        <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.price') }}: </span>$ {{ number_format($orderItem["motorcycle"]->getPrice()) }}</p>
                        <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.quantity') }}: </span>{{ $orderItem["quantity"] }}</p>

                        <form action="{{ route('order.delete', ['id' => $key]) }}" method="post">
                            @csrf
                            {{ method_field('delete') }}
                            <button class="btn btn-danger" type="submit">{{ trans('messages.delete') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    <p class="text-center m-0 text-white"><span class="primary-color-app">{{ trans('messages.subTotal') }}: </span>$ {{number_format($viewData["subTotal"])}}</p>

    @if($viewData["subTotal"] > 0)
        <p class="text-center m-0 text-white"><span class="primary-color-app">{{ trans('messages.total') }}: </span>$ {{ number_format($viewData["total"])}}</p>
        <p class="text-center m-0 text-white"><span class="primary-color-app">{{ trans('messages.shippingValue') }}: </span>$ {{number_format($viewData["shippingValue"])}}</p>
        <form class="w-50 m-auto mb-3" method="post" action="{{ route('order.save') }}" id="form-save">
            @csrf
            <div class="input-group">
                <span class="input-group-text border-0 bg-secondary-color-app primary-color-app">{{ trans('messages.shippingAddress') }}</span>
                <input class="form-control text-white search-bar-app" name="shipping_address" type="text" value="{{ Auth::user()->address }}">
            </div>
        </form>
    @endif

    <div class="row my-3">
        <div class="col-2 ms-auto">
            <form action="{{ route('order.deleteAll') }}" method="post">
                @csrf
                {{ method_field('delete') }}
                <button class="btn btn-danger w-100" type="submit">{{ trans('messages.deleteAll') }}</button>
            </form>
        </div>

        <div class="col-2 me-auto">
            <button
                form="form-save"
                type="submit"
                @class([
                'btn',
                'btn-primary-app',
                'w-100',
                'disabled' => $viewData["subTotal"] == 0
            ])>
                {{ trans('messages.buy') }}
            </button>
        </div>
    </div>
</div>
@endsection
