@extends('layouts.app')
@section('title', '- '.$viewData["motorcycle"]->getName())
@section('subtitle', $viewData["motorcycle"]->getName())
@section('content')
<div class="container">
    <h1>
        {{ $viewData["motorcycle"]->getName() }}
    </h1>
    <img class="my-2" style="width: 200px; height: 150px" src="{{ URL::asset('storage/' . $viewData["motorcycle"]->getImage()) }}" alt="logo">
    <p class="card-text my-2">{{ $viewData["motorcycle"]->getDescription() }}</p>
    <p class="card-text my-2">Stock: {{ $viewData["motorcycle"]->getStock() }}</p>
    <p class="card-text my-2">${{ $viewData["motorcycle"]->getPrice() }}</p>
    @if($viewData["motorcycle"]->getIsActive())
        <a href="{{ route( 'admin.motorcycle.disable' , ['id' =>$viewData["motorcycle"]->getId()]) }}" class="btn btn-primary-app text-white my-2">{{trans('messages.disableForSale')}}</a>
    @else
        <a href="{{ route( 'admin.motorcycle.enable' , ['id' =>$viewData["motorcycle"]->getId()]) }}" class="btn btn-primary-app text-white my-2">{{trans('messages.enableForSale')}}</a>
    @endif
</div>
@endsection
