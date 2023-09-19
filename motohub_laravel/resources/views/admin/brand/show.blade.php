@extends('layouts.app')
@section('title', '- '.$viewData["brand"]->getName())
@section('subtitle', $viewData["brand"]->getName())
@section('content')
<div class="container">
    <h1 class="text-center my-3">{{ trans('messages.brandInfo') }}</h1>
    @include('includes.infoBrand')
    <h1 class="text-center">{{ trans('messages.motorcycles') }}</h1>
    <div class="row">
        @foreach ($viewData["brand"]->getMotorcycles() as $motorcycle)
            @include('includes.motorcycleCard')
        @endforeach
    </div>
</div>
@endsection
