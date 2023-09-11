@extends('layouts.app')
@section('title', 'Orden')
@section('content')
<div class="container">
    <div class="row">
        @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <h1>Orden</h1>
        <h3>SubTotal: ${{$viewData["subTotal"]}}</h3>

        @if($viewData["subTotal"] > 0)
            <h3>Total: ${{$viewData["total"]}}</h3>
            <h5>Costo de envío: ${{$viewData["shippingValue"]}}</h5>
        @endif

        <form method="post" action="{{ route('order.add') }}">
            @csrf
            <input type="number" name="motorcycle_id" value="9" hidden>
            <label for="quantity">Cantidad</label>
            <input id="quantity" type="number" value="1" name="quantity">
            <input type="submit" value="Enviar">
        </form>


        @foreach($viewData["orderItems"] as $key => $orderItem)
            <div class="col-6 mt-3">
                <div class="card m-auto w-75" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Nombre</h5>
                        <p class="card-text">{{ $orderItem["motorcycle"]["name"] }}</p>

                        <h5 class="card-title fw-bold">Imagen</h5>
                        <p class="card-text">{{ $orderItem["motorcycle"]["image"] }}</p>

                        <h5 class="card-title fw-bold">Precio</h5>
                        <p class="card-text">{{ $orderItem["motorcycle"]["price"] }}</p>

                        <h5 class="card-title fw-bold">Cantidad</h5>
                        <p class="card-text">{{ $orderItem["quantity"] }}</p>

                        <form action="{{ route('order.delete', ['id' => $key]) }}" method="post">
                            @csrf
                            {{ method_field('delete') }}
                            <button class="btn btn-danger" type="submit">Eliminar de la orden</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center">
            <form action="{{ route('order.deleteAll') }}" method="post" class="d-inline-block">
                @csrf
                {{ method_field('delete') }}
                <button class="btn btn-danger" type="submit">Eliminar todos</button>
            </form>

            <form method="post" action="{{ route('order.save') }}">
                @csrf
                <button type="submit" @class([
                    'btn',
                    'btn-success',
                    'disabled' => $viewData["subTotal"] == 0
                ])>
                    Comprar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
