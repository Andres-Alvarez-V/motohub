@extends('layouts.app')
@section('title', '- ' . trans('messages.orderTitle'))
@section('content')
    <ul id="messages" class="alert alert-success list-unstyled">
        <li>{{ trans('messages.orderSave') }}</li>
    </ul>
@endsection
