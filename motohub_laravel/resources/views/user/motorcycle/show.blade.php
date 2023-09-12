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
    <form method="POST" action="{{ route('order.add') }}">
        @csrf
        <input type="hidden" name="motorcycle_id" value="{{ $viewData['id'] }}">
        <input type="number" name="quantity" placeholder="0">
        <button type="submit" class=" btn btn-primary">Add to cart</button>
    </form>
</div>
@endsection