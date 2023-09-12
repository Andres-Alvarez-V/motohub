@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["title"])
@section('content')
<div class="container">
    <h1>
        {{ $viewData["name"] }}
    </h1>
    <img class="my-2" style="width: 200px; height: 150px" src="{{$viewData['logo_image']}}" alt="logo">
    <p class="card-text my-2">{{ $viewData["description"] }}</p>
    <ul class="list-group">
    @foreach ($viewData["brand"]->getMotorcycles() as $motorcycle)
        <li class="list-group-item">{{$motorcycle["name"]}}</li>
    @endforeach
    </ul>
</div>
@endsection