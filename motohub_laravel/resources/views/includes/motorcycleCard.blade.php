<div class="col-lg-4 col-md-6 mb-4">
    <div class="card w-75 m-auto border-0 bg-secondary-color-app">
        <div class="card-header">
            <p class="m-0 fw-bold primary-color-app">{{$motorcycle->getName()}}</p>
        </div>
        <div class="card-body secondary-color-app">
            <div class="w-75 mx-auto mb-3" style="height: 10em;">
                <img
                    src="{{ URL::asset('storage/' . $motorcycle->getImage())}}"
                    class="w-100 h-100 object-fit-scale"
                    alt="{{$motorcycle->getName() . ' image'}}"
                >
            </div>

            <div class="mb-3 description-container-app">
                <h5 class="card-title primary-color-app">{{ trans('messages.aboutBike') }}</h5>
                <p class="card-text">{{$motorcycle->getDescription()}}</p>
            </div>

            <div class="mb-2">
                <h5 class="card-title primary-color-app">{{ trans('messages.price') }}</h5>
                <p class="card-text fw-bold">$ {{ number_format($motorcycle->getPrice()) }}</p>
            </div>

            <div class="text-center">
                @if (Route::currentRouteName() == 'admin.motorcycle.index')
                    <a
                        href="{{ route('admin.motorcycle.show', ['id'=> $motorcycle->getId()]) }}"
                        class="btn btn-primary-app">{{trans('messages.show')}}
                    </a>
                    <a
                        href="{{ route('admin.motorcycle.edit', ['id'=> $motorcycle->getId()]) }}"
                        class="btn btn-primary-app">{{ trans('messages.edit') }}
                    </a>
                @else
                    <a
                        href="{{ route('user.motorcycle.show', ['id'=> $motorcycle->getId()]) }}"
                        class="btn btn-primary-app">{{trans('messages.show')}}
                    </a>
                @endif
            </div>
        </div>
        <div class="card-footer secondary-color-app">
            <p class="text-center m-0">{{$motorcycle->getState()}}</p>
        </div>
    </div>
</div>
