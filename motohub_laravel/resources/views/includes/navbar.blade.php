<nav class="navbar navbar-expand-md shadow-sm bg-secondary-color-app">
    <div class="container-fluid">

        <a class="navbar-brand ms-2" href="{{ route('user.index') }}">
            <div class="logo-container-app">
                <img src="{{ asset('images/motohub.png') }}" alt="MotoHub" class="logo-image-app" />
            </div>
        </a>

        <li class="nav-item dropdown list-group-item">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ trans('messages.language') }}
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('lang.change', ['locale' => 'es']) }}">
                        ES
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('lang.change', ['locale' => 'en']) }}">
                        EN
                    </a>
                </li>
            </ul>
        </li>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active text-white"
                        href="{{ route('user.index') }}">{{ trans('messages.home') }}</a>
                </li>

                @guest
                    <div class="vr bg-white mx-2 d-none d-md-block"></div>

                    <a class="nav-link active text-white" href="{{ route('login') }}">{{ trans('messages.login') }}</a>
                    <a class="nav-link active text-white" href="{{ route('register') }}">{{ trans('messages.register') }}</a>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('user.motorcycle.index') }}">
                            {{ trans('messages.motorcycles') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('user.brand.index') }}">
                            {{ trans('messages.brands') }}
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('map.index') }}">{{ trans('messages.map') }}</a>
                    </li> -->

                    <div class="vr bg-white mx-2 d-none d-md-block"></div>
                    @if (Auth::user()->role == config('constants.ROLE_ADMIN'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.analytics.index') }}">{{ trans('messages.analyticsTitle') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.brand.index') }}">{{ trans('messages.adminBrands') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white"href="{{ route('admin.motorcycle.index') }}">{{ trans('messages.adminMotorcycles') }}</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link text-white text-center" href="{{ route('order.index') }}">
                            {{ trans('messages.cart') }}
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: #fff;"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <p class="dropdown-item m-0"><span class="fw-bold">{{ trans('messages.balance')}}:</span> $ {{ number_format(Auth::user()->balance)}}</p>
                            </li>
                            <li>
                                <form id="logout" action="{{ route('logout') }}" method="POST">
                                    <a role="button" class="dropdown-item" onclick="document.getElementById('logout').submit();">{{ trans('messages.logout') }}</a>
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
