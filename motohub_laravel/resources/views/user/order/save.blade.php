@extends('layouts.app')
@section('title', '- ' . trans('messages.orderTitle'))
@section('content')
    <ul id="messages" class="alert alert-success list-unstyled my-3">
        <li>{{ trans('messages.orderSave') }}</li>
    </ul>
@endsection
