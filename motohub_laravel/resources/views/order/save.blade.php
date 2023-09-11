@extends('layouts.app')
@section('title', 'Orden')
@section('content')
    <ul id="messages" class="alert alert-success list-unstyled">
        <li>{{ $viewData["message"] }}</li>
    </ul>
@endsection
