<div class="row w-75 mb-3 m-auto">
    <div class="card col-md-3 col-sm-12 bg-secondary-color-app" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
        <div class="m-auto w-100" style="height: 200px;" >
            <img class="w-100 h-100 object-fit-scale" src="{{ URL::asset('storage/' . $viewData["motorcycle"]->getImage()) }}">
        </div>
    </div>

    <div class="card col-md-9 col-sm-12 bg-secondary-color-app" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
        <div class="card-body">
            <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.name') }}: </span>{{$viewData["motorcycle"]->getName()}}</p>
            <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.category') }}: </span>{{$viewData["motorcycle"]->getCategory()}}</p>
            <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.model') }}: </span>{{$viewData["motorcycle"]->getModel()}}</p>
            <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.description') }}: </span>{{$viewData["motorcycle"]->getDescription()}}</p>
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.price') }}: </span>$ {{ number_format($viewData["motorcycle"]->getPrice()) }}</p>
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.displacement') }}: </span>{{ $viewData["displacement"] }}</p>    
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.engine') }}: </span>{{ $viewData["engine"] }}</p>    
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.power') }}: </span>{{ $viewData["power"] }}</p>    
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.torque') }}: </span>{{ $viewData["torque"] }}</p>    
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.valves_per_cylinder') }}: </span>{{ $viewData["valvesPerCylinder"] }}</p>    
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.fuel_system') }}: </span>{{ $viewData["fuelSystem"] }}</p>    
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.cooling') }}: </span>{{ $viewData["cooling"] }}</p>    
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.front_tire') }}: </span>{{ $viewData["frontTire"] }}</p>    
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.rear_tire') }}: </span>{{ $viewData["rearTire"] }}</p>    
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.fuel_capacity') }}: </span>{{ $viewData["fuelCapacity"] }}</p>    
            <p class="card-text text-white fw-bold"><span class="primary-color-app">{{ trans('messages.total_weight') }}: </span>{{ $viewData["totalWeight"] }}</p>    

            @if (Route::currentRouteName() == 'admin.motorcycle.show')
                @if ($viewData["motorcycle"]->getIsActive())
                    <a
                        href="{{ route('admin.motorcycle.disable', ['id' => $viewData['motorcycle']->getId()])}}"
                        class="my-2 btn btn-primary-app">{{ trans('messages.disableForSale') }}
                    </a>
                @else
                    <a
                        href="{{ route('admin.motorcycle.disable', ['id' => $viewData['motorcycle']->getId()])}}"
                        class="my-2 btn btn-primary-app">{{ trans('messages.enableForSale') }}
                    </a>
                @endif
            @else
                <form method="POST" action="{{ route('order.add') }}">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" name="motorcycle_id" value="{{ $viewData["motorcycle"]->getId() }}">
                        <input class="form-control search-bar-app bg-third-color-app" type="number" name="quantity" placeholder="0" min=0 max={{ $viewData["motorcycle"]->getStock() }}>
                        <button type="submit" class=" btn btn-primary-app">{{ trans('messages.addToCart') }}</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
