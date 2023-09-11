@extends('layouts.app')
@section('title', 'Motorcycles')
@section('content')
<div class="row">
    <h1>Motorcycles</h1>
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.motorcycle.create') }}" class="btn btn-primary">Create new motorcycle</a>
    </div>
    @foreach ($viewData["motorcycles"] as $motorcycle)
    <div class="col-md-4 col-lg-3 mb-2 d-flex align-items-stretch">
        <div class="card d-flex align-items-stretch w-75">
            <div class="card-header">
                {{$motorcycle["name"]}}
            </div>
            <div class="d-flex justify-content-center"
                style="height: 100%;width: 100%; overflow: hidden; margin: 0 auto"><img src="{{$motorcycle->getImage()}}"
                    class="card-img-top w-75"></div>
            <div class="card-body">
                <p class="card-text">{{$motorcycle["description"]}}</p>
                <a href="{{ route('admin.motorcycle.show', ['id'=> $motorcycle->getId()]) }}" class="btn btn-primary">Show</a>
            </div>
            <div class="card-footer text-center text-muted">
                {{$motorcycle["state"]}}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection