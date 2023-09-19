@extends('layouts.app')
@section('title', '- '.trans('messages.brands'))
@section('content')
<div class="container">
    <h1 class="text-center my-3">{{trans('messages.brands')}}</h1>
    @include('includes.searchBar')
    <div class="row">
        @foreach ($viewData["brands"] as $brand)
            @include('includes.brandCard')
        @endforeach
    </div>
</div>
@endsection
