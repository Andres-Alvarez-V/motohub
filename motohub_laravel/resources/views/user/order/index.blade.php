@extends('layouts.app')
@section('title', '- ' . trans('messages.orderTitle'))
@section('content')
<div class="container">
    <div class="row">
        @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <h1>{{ trans('messages.shoppingCart') }}</h1>
        <h3>{{ trans('messages.subTotal') }}: ${{$viewData["subTotal"]}}</h3>

        @if($viewData["subTotal"] > 0)
        <h3>{{ trans('messages.total') }}: ${{$viewData["total"]}}</h3>
        <h5>{{ trans('messages.shippingValue') }}: ${{$viewData["shippingValue"]}}</h5>
        @endif

        @foreach($viewData["orderItems"] as $key => $orderItem)
            <div class="col-6 mt-3">
                <div class="card m-auto w-75" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ trans('messages.name') }}</h5>
                        <p class="card-text">{{ $orderItem["motorcycle"]["name"] }}</p>

                        <h5 class="card-title fw-bold">{{ trans('messages.image') }}</h5>
                        <p class="card-text">{{ $orderItem["motorcycle"]["image"] }}</p>

                        <h5 class="card-title fw-bold">{{ trans('messages.price') }}</h5>
                        <p class="card-text">{{ $orderItem["motorcycle"]["price"] }}</p>

                        <h5 class="card-title fw-bold">{{ trans('messages.quantity') }}</h5>
                        <p class="card-text">{{ $orderItem["quantity"] }}</p>

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
    <div class="row mt-5">
        <div class="col-2 ms-auto">
            <form action="{{ route('order.deleteAll') }}" method="post">
                @csrf
                {{ method_field('delete') }}
                <button class="btn btn-danger w-100" type="submit">{{ trans('messages.deleteAll') }}</button>
            </form>
        </div>
        <div class="col-2 me-auto">
            <form method="post" action="{{ route('order.save') }}">
                @csrf
                <button type="submit" @class([
                    'btn',
                    'btn-success',
                    'w-100',
                    'disabled' => $viewData["subTotal"] == 0
                ])>
                    {{ trans('messages.buy') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
