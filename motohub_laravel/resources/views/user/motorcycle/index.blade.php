@extends('layouts.app')
@section('title', '- '.trans('messages.motorcycles'))
@section('content')
<div class="container">
    <h1 class="text-center my-3">{{trans('messages.motorcycles')}}</h1>
    @include('includes.searchBar')
    <div class="row">
        @foreach ($viewData["motorcycles"] as $motorcycle)
            @include('includes.motorcycleCard')
        @endforeach
    </div>
</div>
@endsection
