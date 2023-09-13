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
    <a href="/admin/motorcycles/delete/{{$viewData["motorcycle"]->getId()}}" class="btn bg-primary text-white my-2">Delete</a>
</div>
@endsection