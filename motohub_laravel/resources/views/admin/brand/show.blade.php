@extends('layouts.app')
@section('title', '- '.$viewData["brand"]->getName())
@section('subtitle', $viewData["brand"]->getName())
@section('content')
<div class="container">
    <h1>
        {{ $viewData["brand"]->getName() }}
    </h1>
    <img class="my-2" style="width: 200px; height: 150px" src="{{ asset('images/brands/' . $viewData["brand"]->getLogoImage())}}" alt="logo">
    <p class="my-2">{{ $viewData["brand"]->getDescription() }}</p>
    <a
        href="{{ route('admin.brand.delete', ['id' => $viewData['brand']->getId()])}}"
        class="my-2 btn btn-primary-app">Delete</a>
    <h1 class="text-center">{{ trans('messages.motorcycles') }}</h1>
    <div class="row">
        @foreach ($viewData["brand"]->getMotorcycles() as $motorcycle)
            @include('includes.motorcycleCard')
        @endforeach
    </div>
</div>
@endsection
