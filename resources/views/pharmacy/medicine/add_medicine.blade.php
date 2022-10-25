@extends('layouts.app')

@section('content')
@include('flash-message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Drug') }}</div>

                <div class="card-body">
                    <form method="POST" action="/medicines" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Drug Photo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="file" class="form-control " name="image"  >
                                                                        
                                @error('generic_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="generic_name" class="col-md-4 col-form-label text-md-end">{{ __('Generic Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="generic_name" value="{{ old('name') }}" required autocomplete="generic_name" autofocus>

                                @error('generic_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            {{-- <div class="col-md-6">
                                <input id="pharmacy_id" type="int" class="form-control @error('pharmacy_id') is-invalid @enderror" name="pharmacy_id" value="{{ Auth::user()->id }}" required hidden>

                            </div> --}}
                        </div>

                        <div class="row mb-3">
                            <label for="instructions" class="col-md-4 col-form-label text-md-end">{{ __('Instructions') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="instructions" type="text" class="form-control @error('instructions') is-invalid @enderror" name="instructions" required autocomplete="instructions"> --}}
                                <textarea class="form-control" name="instructions" rows="3"></textarea>

                                @error('instructions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="manufacture" class="col-md-4 col-form-label text-md-end">{{ __('Manufacture') }}</label>

                            <div class="col-md-6">
                                <input id="manufacture" type="text" class="form-control @error('manufacture') is-invalid @enderror" name="manufacture" required autocomplete="manufacture">

                                @error('manufacture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description"> --}}
                                <textarea class="form-control" name="description" rows="3"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dose" class="col-md-4 col-form-label text-md-end">{{ __('Dose') }}</label>

                            <div class="col-md-6">
                                <input id="dose" type="int" class="form-control @error('dose') is-invalid @enderror" name="dose" required autocomplete="dose">

                                @error('dose')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dose_unit" class="col-md-4 col-form-label text-md-end">{{ __('Dose unit') }}</label>

                            <div class="col-md-6">
                                <input id="dose_unit" type="int" class="form-control @error('dose_unit') is-invalid @enderror" name="dose_unit" required autocomplete="dose_unit">

                                @error('dose_unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="int" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="available" class="col-md-4 col-form-label text-md-end">{{ __('Available') }}</label>

                            <div class="col-md-6">
                                <input id="available" type="int" class="form-control"  name="available" required >


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="starting_date" class="col-md-4 col-form-label text-md-end">{{ __('Starting date') }}</label>

                            <div class="col-md-6">
                                <input id="starting_date" type="date" class="form-control @error('starting_date') is-invalid @enderror" name="starting_date" required autocomplete="starting_date">

                                @error('starting_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="expiry_date" class="col-md-4 col-form-label text-md-end">{{ __('Expiry date') }}</label>

                            <div class="col-md-6">
                                <input id="expiry_date" type="date" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date" required autocomplete="expiry_date">

                                @error('expiry_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Add drug') }}
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
