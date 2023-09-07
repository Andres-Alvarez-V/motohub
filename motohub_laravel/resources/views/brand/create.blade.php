@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$viewData["title"]}}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('brand.save') }}">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter country origin" name="country_origin" value="{{ old('country_origin') }}" />
                        <input type="number" class="form-control mb-2" placeholder="Enter foundation year" name="foundation_year" value="{{ old('foundation_year') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter logo url" name="logo_image" value="{{ old('logo_image') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter a descrption" name="description" value="{{ old('description') }}" />
                        <input type="submit" class="btn btn-primary" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection