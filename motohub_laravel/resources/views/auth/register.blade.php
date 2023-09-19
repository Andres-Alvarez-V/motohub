@extends('layouts.app')
@section('title', '- ' . trans('messages.register'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card bg-secondary-color-app mt-5">
                <div class="card-header-app text-white">{{ trans('messages.register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-12">
                                <input id=" name" type="text" placeholder="{{ trans('messages.name') }}"
                                class="input-app text-white @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-12">
                                <input id="birthDate" type="date" placeholder="{{ trans('messages.birthDate') }}"
                                    class="input-app text-white @error('birthDate') is-invalid @enderror"
                                    name="birthDate" value="{{ old('birthDate') }}" required autocomplete="birthDate"
                                    autofocus>

                                @error('birthDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-12">
                                <input id="address" type="text" placeholder="{{ trans('messages.address') }}"
                                    class="input-app text-white @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" required autocomplete="address"
                                    autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-12">
                                <input id="username" type="text" placeholder="{{ trans('messages.username') }}"
                                    class="input-app text-white @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" required autocomplete="username"
                                    autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-12">
                                <input id="email" type="email" placeholder="{{ trans('messages.email') }}"
                                    class="input-app text-white @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-12">
                                <input id="password" type="password" placeholder="{{ trans('messages.password') }}"
                                    class="input-app text-white @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-12">
                                <input id="password-confirm" type="password"
                                    placeholder="{{ trans('messages.confirmPassword') }}"
                                    class="input-app text-white" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary-app col-6">
                                {{ trans('messages.register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
