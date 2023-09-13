@extends('layouts.app')
@section('title', $viewData["motorcycle"]->getName())
@section('subtitle', $viewData["motorcycle"]->getName())
@section('content')
<div class="container">
    <h1>
        {{ $viewData["motorcycle"]->getName() }}
    </h1>
    <img class="my-2" style="width: 200px; height: 150px" src="{{$viewData['motorcycle']->getImage()}}" alt="logo">
    <p class="card-text my-2">{{ $viewData["motorcycle"]->getDescription() }}</p>
    <p class="card-text my-2">Stock: {{ $viewData["motorcycle"]->getStock() }}</p>
    <p class="card-text my-2">${{ $viewData["motorcycle"]->getPrice() }}</p>
    <form method="POST" action="{{ route('order.add') }}">
        @csrf
        <input type="hidden" name="motorcycle_id" value="{{ $viewData["motorcycle"]->getId() }}">
        <input type="number" name="quantity" placeholder="0">
        <button type="submit" class=" btn btn-primary-app">{{ trans('messages.addToCart') }}</button>
    </form>
</div>
@endsection