@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["title"])
@section('content')
<div class="container">
    <h1>
        {{ $viewData["name"] }}
    </h1>
    <img class="my-2" style="width: 200px; height: 150px" src="{{$viewData['image']}}" alt="logo">
    <p class="card-text my-2">{{ $viewData["description"] }}</p>
    <p class="card-text my-2">Stock: {{ $viewData["stock"] }}</p>
    <p class="card-text my-2">${{ $viewData["price"] }}</p>
    <a href="/brands/delete/{{$viewData["id"]}}" class="btn bg-primary text-white my-2">Delete</a>
</div>
@endsection