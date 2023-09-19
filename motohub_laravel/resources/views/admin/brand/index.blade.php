@extends('layouts.app')
@section('title', '- '.trans('messages.brands'))
@section('content')
<div class="container">
    <h1 class="mt-3 text-center">{{ trans('messages.brands') }}</h1>
    <div class="mb-4 text-center">
        <a href="{{ route('admin.brand.create') }}" class="btn btn-primary-app">{{ trans('messages.createBrands') }}</a>
    </div>
    <div class="row">
        @foreach ($viewData["brands"] as $brand)
            @include('includes.brandCard')
        @endforeach
    </div>
</div>
@endsection
