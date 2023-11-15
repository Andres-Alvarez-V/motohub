@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-8 m-auto text-center">
            <h3>Motohub</h3>
            <p class="text-white">
                {{ trans('messages.homeInfo') }}
            </p>
        </div>
    </div>
</div>
@endsection
