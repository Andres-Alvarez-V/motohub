<nav class="navbar navbar-expand-md shadow-sm bg-color-secondary-app">
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
                <div class="vr bg-white mx-2 d-none d-lg-block"></div>

                <a class="nav-link active text-white" href="{{ route('login') }}">{{ trans('messages.login') }}</a>
                <a class="nav-link active text-white"
                    href="{{ route('register') }}">{{ trans('messages.register') }}</a>
                @else
                @if (Auth::user()->role == config('constants.ROLE_ADMIN'))
                <li class="nav-item">
                    <a class="nav-link text-white"
                        href="{{ route('admin.brand.index') }}">{{ trans('messages.adminBrands') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white"
                        href="{{ route('admin.motorcycle.index') }}">{{ trans('messages.adminMotorcycles') }}</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link active text-white"
                        href="{{ route('map.index') }}">{{ trans('messages.map') }}</a>
                </li>

                <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                <li class="nav-item">
                    <a href="{{ route('user.motorcycle.index') }}" class="nav-link text-white">
                        {{ trans('messages.motorcycles') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.brand.index') }}" class="nav-link text-white">
                        {{ trans('messages.brands') }}
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <p class="dropdown-item">
                                <strong>{{ trans('messages.balance').': '}}</strong>{{ '$'.Auth::user()->balance }}</p>
                        </li>
                        <li>
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                <a role="button" class="dropdown-item"
                                    onclick="document.getElementById('logout').submit();">{{ trans('messages.logout') }}</a>
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.analytics.index') }}">{{ trans('messages.analyticsTitle') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white"href="{{ route('admin.motorcycle.index') }}">{{ trans('messages.adminMotorcycles') }}</a>
                        </li>
                    @endif

                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    <li class="nav-item">
                        <a href="{{ route('user.motorcycle.index') }}" class="nav-link text-white">
                            {{ trans('messages.motorcycles') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.brand.index') }}" class="nav-link text-white">
                            {{ trans('messages.brands') }}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <p class="dropdown-item"><strong>{{ trans('messages.balance').': '}}</strong>{{ '$'.Auth::user()->balance }}</p>
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