@extends('layouts.app')
@section('title', $viewData["brand"]->getName())
@section('subtitle', $viewData["brand"]->getName())
@section('content')
<div class="container">
    <h1>
        {{ $viewData["brand"]->getName() }}
    </h1>
    <img class="my-2" style="width: 200px; height: 150px" src="{{$viewData['brand']->getLogoImage()}}" alt="logo">
    <p class="card-text my-2">{{ $viewData["brand"]->getDescription() }}</p>
    <a href="/admin/brands/delete/{{$viewData["brand"]->getId()}}" class="btn text-white my-2 btn-primary">Delete</a>
    <ul class="list-group">
    @foreach ($viewData["brand"]->getMotorcycles() as $motorcycle)
        <li class="list-group-item">{{$motorcycle["name"]}}</li>
    @endforeach
    </ul>
</div>
@endsection