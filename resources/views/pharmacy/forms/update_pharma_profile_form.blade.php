@extends('layouts.app')

@section('content')
    @include('flash-message')
    <div class="container bg-white">
        <h1>Edit Pharmacy Profile</h1>
        {{-- Profile and cover image --}}
        <div class="container profile-info">

            <div class="col cover py-3">
                <img id="coverPreview" src="{{ asset('images/' . $pharmacy->cover_image) }}" width="100%" height="200" alt="">
            </div>
        </div>

        <div class="row py-3">

            <form action="/users/{{ $pharmacy->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col profile mx-5">
                        <img id="profilePreview" src="{{ asset('images/' . $pharmacy->profile_image) }}" alt="">
                        <span class="btn btn-outline-secondary btn-file">
                            <img src="{{ asset('storage/photo_camera_black_18dp.svg') }}" alt=""> 
                            <input id="uploadProfile" type="file" name="profile_image">
                        </span>
                    </div>
                    <div class="col edit-btn text-end">
                        <span class="btn btn-outline-secondary text-center btn-file">
                            Edit Cover <input id="uploadCover" type="file" name="cover_image">
                        </span>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-sm col-lg-6">
                            <div>
                                <label for="name">Company Name</label>
                                <input type="text" class="form-control my-3" value="{{ $pharmacy->name }}"
                                    name="name">
                            </div>
                            <div>
                                <label for="address">Location</label>
                                <input type="text" class="form-control my-3" value="{{ $pharmacy->address }}"
                                    name="address">
                            </div>
                            <div>
                                <label for="liscence">Liscence</label>
                                <input id="uploadImage" type="file" class="form-control my-3" name="liscence"
                                    value="{{ $pharmacy->liscence }}">

                            </div>
                            <div>

                                <label for="start-date">Founded</label>
                                <input type="date" class="form-control my-3" min="1899-01-31" max="2023-12-01"
                                    name="founded" value="{{ $pharmacy->founded }}">
                            </div>
                            <div>
                                <label for="bio">Bio</label>
                                <textarea class="form-control" name="bio" rows="3">{{ $pharmacy->bio }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm col-lg-6">
                            <div>
                                <label for="owner">Owner Name</label>
                                <input type="text" class="form-control my-3" name="owner_name"
                                    value="{{ $pharmacy->owner_name }}">

                            </div>
                            <div>
                                <label for="email">Email</label>
                                <input type="email" class="form-control my-3" name="email"
                                    value="{{ $pharmacy->email }}">

                            </div>
                            <div>
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control my-3" name="phone"
                                    value="{{ $pharmacy->phone }}">

                            </div>
                            <div class="row mb-3">
                                <label for="Region"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Region') }}</label>

                                <div class="col-md-6 text-start">

                                    <select class="form-control @error('region') is-invalid @enderror"
                                        value="{{ $pharmacy->region }}" autocomplete="region" id="region"
                                        name="region">
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
                                        class="form-control @error('city') is-invalid @enderror" name="city"
                                        value="{{ $pharmacy->city }}" autocomplete="city">

                                    @error('city')
                                        <span class="invalid-feedback" role="city">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="postal_code"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Postal code') }}</label>

                                <div class="col-md-6">
                                    <input id="postal_code" type="text"
                                        class="form-control @error('postal_code') is-invalid @enderror" name="postal_code"
                                        value="{{ $pharmacy->postal_code }}" autocomplete="postal_code">

                                    @error('postal_code')
                                        <span class="invalid-feedback" role="postal_code">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col my-3">
                            <button type="submit" class="btn btn-success">
                                {{ __('Update') }}
                            </button>
                        </div>
                        <div class="col my-3 text-end">
                            <a href="/users/{{ $pharmacy->id }}" class="btn btn-primary">
                                {{ __('Back') }}
                            </a>
                        </div>

                    </div>

                </div>
            </form>


        </div>
    </div>
@endsection
