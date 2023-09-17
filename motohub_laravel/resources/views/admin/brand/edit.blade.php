@extends('layouts.app')
@section('title', '- '.trans('messages.brands'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('messages.brands') }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.brand.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $viewData['brand']->getId() }}" />
                        <input type="text" class="form-control mb-2" value="{{ $viewData['brand']->getName() }}" name="name"/>
                        <input type="text" class="form-control mb-2" value="{{ $viewData['brand']->getCountryOrigin() }}" name="model"/>
                        <input type="text" class="form-control mb-2" value="{{ $viewData['brand']->getFoundationYear() }}" name="category"/>
                        <input type="file" class="form-control mb-2" name="image" />
                        <input type="text" class="form-control mb-2" value="{{ $viewData['brand']->getDescription() }}" name="description"/>
                        <input type="submit" class="btn btn-primary-app" value="{{ trans('messages.update') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection