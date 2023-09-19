<div class="row w-75 mb-3 m-auto">
    <div class="card col-md-3 col-sm-12 bg-secondary-color-app" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
        <div class="m-auto w-100" style="height: 200px;" >
            <img class="w-100 h-100 object-fit-scale" src="{{ URL::asset('storage/' . $viewData["brand"]->getLogoImage()) }}">
        </div>
    </div>

    <div class="card col-md-9 col-sm-12 bg-secondary-color-app" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
        <div class="card-body">
            <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.name') }}: </span>{{$viewData["brand"]->getName()}}</p>
            <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.description') }}: </span>{{$viewData["brand"]->getDescription()}}</p>
            <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.originCountry') }}: </span>{{$viewData["brand"]->getCountryOrigin()}}</p>
            <p class="card-text text-white"><span class="fw-bold primary-color-app">{{ trans('messages.foundationYear') }}: </span>{{$viewData["brand"]->getFoundationYear()}}</p>

            @if (Route::currentRouteName() == 'admin.brand.show')
            <a
                href="{{ route('admin.brand.delete', ['id' => $viewData['brand']->getId()])}}"
                class="my-2 btn btn-primary-app">{{ trans('messages.delete') }}
            </a>
            @endif
        </div>
    </div>
</div>
