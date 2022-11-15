@extends('layouts.app')

@section('content')
    @include('flash-message')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register Pharmacy') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/pharmacies" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Pharmacy Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                         required  autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="owner_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Owner Name') }}</label>

                                <div class="col-md-6">
                                    <input id="owner_name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="owner_name"
                                        value="{{ old('owner_name') }}" required autocomplete="owner_name" autofocus>

                                    @error('owner_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="int"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="liscence"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Liscence') }}</label>

                                    <div class="col-md-6">
                                        <input id="liscence" type="file"
                                            class="form-control @error('liscence') is-invalid @enderror" name="liscence"
                                            value="{{ old('liscence') }}" >

                                        @error('liscence')
                                            <span class="invalid-feedback" role="liscence">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Region"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Region') }}</label>

                                    <div class="col-md-6">

                                        <select class="form-control @error('region') is-invalid @enderror"
                                            value="{{ old('region') }}" autocomplete="region" id="region" name="region">
                                            <option value="AHAFO">AHAFO</option>
                                            <option value="ASHANTI">ASHANTI</option>
                                            <option value="BONO EAST">BONO EAST</option>
                                            <option value="BRONG AHAFO">BRONG AHAFO</option>
                                            <option value="CENTRAL">CENTRAL</option>
                                            <option value="EASTERN">EASTERN</option>
                                            <option value="GREATER ACCRA">GREATER ACCRA</option>
                                            <option value="NORTHERN">NORTHERN</option>
                                            <option value="OTI">OTI</option>
                                            <option value="SAVANNAH">SAVANNAH</option>
                                            <option value="UPPER EAST">UPPER EAST</option>
                                            <option value="UPPER WEST">UPPER WEST</option>
                                            <option value="WESTERN">WESTERN</option>
                                            <option value="WESTERN NORTH">WESTERN NORTH</option>
                                            <option value="VOLTA">VOLTA</option>
                                        </select>

                                        @error('Region')
                                            <span class="invalid-feedback" role="Region">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="city"
                                        class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text"
                                            class="form-control @error('liscence') is-invalid @enderror" name="city"
                                            value="{{ old('city') }}" autocomplete="city" required>

                                        @error('city')
                                            <span class="invalid-feedback" role="city">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection





   