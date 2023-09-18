<div class="col-lg-4 col-md-6 mb-4">
    <div class="card w-75 m-auto border-0 bg-secondary-color-app">
        <div class="card-header">
            <p class="m-0 fw-bold primary-color-app">{{$brand->getName()}}</p>
        </div>
        <div class="card-body secondary-color-app">
            <div class="w-75 mx-auto mb-3" style="height: 10em;">
                <img
                    src="{{ URL::asset('storage/' . $brand->getLogoImage())}}"
                    class="w-100 h-100 object-fit-scale"
                    alt="{{$brand->getName() . ' image'}}"
                >
            </div>

            <div class="mb-3 description-container-app">
                <h5 class="card-title primary-color-app">{{ trans('messages.aboutBrand') }}</h5>
                <p class="card-text">{{$brand->getDescription()}}</p>
            </div>

            <div class="mb-2">
                <h5 class="card-title primary-color-app">{{ trans('messages.originCountry') }}</h5>
                <p class="card-text fw-bold">{{ trans('messages.' . strtolower($brand->getCountryOrigin())) }}</p>
            </div>

            <div class="text-center">
                <a
                    href="{{ Route::currentRouteName() == 'admin.brand.index' ? route('admin.brand.show', ['id'=> $brand->getId()]) : route('user.brand.show', ['id'=> $brand->getId()]) }}"
                    class="btn btn-primary-app">{{trans('messages.show')}}</a>
            </div>
        </div>
        <div class="card-footer secondary-color-app">
            <p class="text-center m-0">{{$brand->getFoundationYear()}}</p>
        </div>
    </div>
</div>
