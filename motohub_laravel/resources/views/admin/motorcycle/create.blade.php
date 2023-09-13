@extends('layouts.app')
@section('title', trans('messages.motorcycles'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('messages.motorcycles') }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.motorcycle.save') }}">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter model" name="model" value="{{ old('model') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter category" name="category" value="{{ old('category') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter image url" name="image" value="{{ old('image') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter a description" name="description" value="{{ old('description') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter a state" name="state" value="{{ old('state') }}" />
                        <label for="brand_id">Brand</label>
                        <select name="brand_id">
                            @foreach ($viewData["brands"] as $brand)
                                <option value="{{$brand->getId()}}">{{$brand->getName()}}</option>
                            @endforeach
                        </select>
                        <input type="number" class="form-control mb-2" placeholder="Enter a stock" name="stock" value="{{ old('stock') }}" />
                        <input type="number" class="form-control mb-2" placeholder="Enter a price" name="price" value="{{ old('price') }}" />
                        <input type="submit" class="btn btn-primary-app-app-app-app-app-app-app" value="{{ trans('messages.send') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection