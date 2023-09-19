@extends('layouts.app')
@section('title', '- '.$viewData["motorcycle"]->getName())
@section('subtitle', $viewData["motorcycle"]->getName())
@section('content')
<div class="container">
    <h1 class="text-center my-3">{{ trans('messages.motoInfo') }}</h1>
    @include('includes.infoMotorcycle')
</div>
@endsection
