@extends('layouts.app')
@section('title', '- '.trans('messages.brands'))
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-8 card-container-app">
            <div class="card bg-secondary-color-app text-white">
                <div class="card-header">{{$viewData["title"]}}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.brand.save') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="input-app text-white mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                        <input type="text" class="input-app text-white mb-2" placeholder="Enter country origin" name="country_origin" value="{{ old('country_origin') }}" />
                        <input type="number" class="input-app text-white mb-2" placeholder="Enter foundation year" name="foundation_year" value="{{ old('foundation_year') }}" />
                        <input type="file" class="input-app text-white mb-2" name="image" />
                        <input type="text" class="input-app text-white mb-2" placeholder="Enter a descrption" name="description" value="{{ old('description') }}" />
                        <div class="row mb-0 d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary-app col-6" value="{{ trans('messages.send') }}" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
