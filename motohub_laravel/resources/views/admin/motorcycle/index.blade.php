@extends('layouts.app')
@section('title', '- '.trans('messages.motorcycles'))
@section('content')
<div class="container">
    <h1 class="mt-3 text-center">{{ trans('messages.motorcycles') }}</h1>
    <div class="mb-4 text-center">
        <a href="{{ route('admin.motorcycle.create') }}"
            class="btn btn-primary-app">{{ trans('messages.createMotorcycles') }}</a>
    </div>
    <div class="row">
        @foreach ($viewData["motorcycles"] as $motorcycle)
            @include('includes.motorcycleCard')
        @endforeach
    </div>
</div>
@endsection
