@extends('layouts.app')
@section('title', '- '.trans('messages.motorcycles'))
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
                    <form method="POST" action="{{ route('admin.motorcycle.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $viewData['motorcycle']->getId() }}" />
                        <input type="text" class="form-control mb-2" value="{{ $viewData['motorcycle']->getName() }}"
                            placeholder="Enter name" name="name" />
                        <input type="text" class="form-control mb-2" value="{{ $viewData['motorcycle']->getModel() }}"
                            placeholder="Enter model" name="model" />
                        <input type="text" class="form-control mb-2"
                            value="{{ $viewData['motorcycle']->getCategory() }}" placeholder="Enter category"
                            name="category" />
                        <input type="file" class="form-control mb-2" name="image" />
                        <input type="text" class="form-control mb-2"
                            value="{{ $viewData['motorcycle']->getDescription() }}" placeholder="Enter a description"
                            name="description" />
                        <div style="display:flex;flex-direction:column;margin:10px 0">
                            <label for="state_id">State</label>
                            <select name="state_id">
                                @foreach ($viewData["states"] as $state)
                                @if ($state->getId() == $viewData['motorcycle']->getStateId())
                                <option selected value="{{$state->getId()}}">{{$state->getName()}}</option>
                                @else
                                <option value="{{$state->getId()}}">{{$state->getName()}}</option>
                                @endif
                                @endforeach
                            </select>
                            <label for="brand_id">Brand</label>
                            <select name="brand_id">
                                @foreach ($viewData["brands"] as $brand)
                                @if ($brand->getId() == $viewData['motorcycle']->getBrandId())
                                <option selected value="{{$brand->getId()}}">{{$brand->getName()}}</option>
                                @else
                                <option value="{{$brand->getId()}}">{{$brand->getName()}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="number" class="form-control mb-2" value="{{ $viewData['motorcycle']->getStock() }}"
                            placeholder="Enter a stock" name="stock" />
                        <input type="number" class="form-control mb-2" value="{{ $viewData['motorcycle']->getPrice() }}"
                            placeholder="Enter a price" name="price" />
                        <input type="submit" class="btn btn-primary-app" value="{{ trans('messages.update') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection