@extends('layouts.app')

@section('content')
    {{-- Drug image --}}





    <div class="container bg-white">
        <h1>Edit Drug Information</h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Edit Drug Information') }}</div>

                        <div class="card-body">
                            <form method="POST" action="/medicines/{{ $medicine->id }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="row">
                                    <div class="col profile m-3 text-center ">
                                        <img id="profilePreview" class=""
                                            src="{{ asset('images/' . $medicine->image) }}" alt="">
                                        <span class="btn btn-outline-secondary btn-file">
                                            <img src="{{ asset('storage/photo_camera_black_18dp.svg') }}" alt="">
                                            <input id="uploadProfile" type="file" name="image">
                                        </span>
                                    </div>
                                    <input id="uploadCover" type="file" hidden>
                                </div>
                                <div class="row mb-3">
                                    <label for="generic_name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Generic Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="generic_name"
                                            value="{{ $medicine->generic_name }}" required autocomplete="generic_name"
                                            autofocus>

                                        @error('generic_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="instructions"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Instructions') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" name="instructions" rows="3">{{ $medicine->instructions }}</textarea>

                                        @error('instructions')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="manufacture"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Manufacture') }}</label>

                                    <div class="col-md-6">
                                        <input id="manufacture" type="text"
                                            class="form-control @error('manufacture') is-invalid @enderror"
                                            name="manufacture" required autocomplete="manufacture"
                                            value="{{ $medicine->manufacture }}">

                                        @error('manufacture')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" name="description" rows="3">{{ $medicine->description }}</textarea>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="dose"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Dose') }}</label>

                                    <div class="col-md-6">
                                        <input id="dose" type="int" class="form-control" name="dose" value="{{ $medicine->dose }}" hidden>

                                        <textarea class="form-control form-control @error('drug_dosage') is-invalid @enderror" 
                                            name="drug_dosage" autocomplete="drug_dosage" name="drug_dosage" rows="3" 
                                            required>{{ $medicine->drug_dosage }}</textarea>

                                            @error('drug_dosage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="dose_unit"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Dose unit') }}</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control form-control @error('drug_dosage_unit') is-invalid @enderror" 
                                           autocomplete="drug_dosage_unit" name="drug_dosage_unit" rows="3" 
                                            required>{{ $medicine->drug_dosage_unit }}</textarea>

                                        <input id="dose_unit" type="int" class="form-control" name="dose_unit" 
                                            value="{{ $medicine->dose_unit }}" hidden>

                                        @error('dose_unit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="price"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                                    <div class="col-md-6">
                                        <input id="price" type="int"
                                            class="form-control @error('price') is-invalid @enderror" name="price"
                                            required autocomplete="dose_unit" value="{{ $medicine->price }}">

                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="available"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Available') }}</label>

                                    <div class="col-md-6">
                                        <input id="available" type="int"
                                            class="form-control @error('available') is-invalid @enderror" name="available"
                                            required autocomplete="dose_unit" value="{{ $medicine->available }}">

                                        @error('available')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="starting_date"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Starting date') }}</label>

                                    <div class="col-md-6">
                                        <input id="starting_date" type="date"
                                            class="form-control @error('starting_date') is-invalid @enderror"
                                            name="starting_date" required autocomplete="starting_date"
                                            value="{{ $medicine->starting_date }}">

                                        @error('starting_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="expiry_date"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Expiry date') }}</label>

                                    <div class="col-md-6">
                                        <input id="expiry_date" type="date"
                                            class="form-control @error('expiry_date') is-invalid @enderror"
                                            name="expiry_date" required autocomplete="expiry_date"
                                            value="{{ $medicine->expiry_date }}">

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
                                    {{ __('Update drug') }}
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
