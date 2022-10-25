@extends('layouts.app')

@section('content')
    @include('flash-message')



    <div class="min-h-screen">

        <div class="tbl-wrapp mb-5">

            <div class="container">

                <div class="spacing"></div>

                
                <div class="row mb-3">
                    
                    
                    <div class="row mb-5 ">
                        {{-- Order Form --}}
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="row mb-3 bg-white">
                                    <div class="card-header h3 text-black p-3">{{ __('Address Details') }}</div>
                                    <p>Name: </p>
                                    <p>email: </p>
                                </div>
                                <div class="row mb-3 bg-white">
                                    <div class="card-header h3 text-black p-3">{{ __('Your Order') }}</div>
                                    <p>Number of items: </p>
                                    <p>Total Amount: </p>
                                </div>
                                <div class="card">

                                    <div class="card-body">
                                        <form method="POST" action="/medicines">
                                            @csrf


                                            <div class="row mb-3">
                                                <label for="phone"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('phone') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        name="generic_name" value="" required autocomplete="phone"
                                                        autofocus>

                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="location"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        name="location" value="" required autocomplete="location"
                                                        autofocus>
                                                        
                                                        @error('location')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <input id="name" type="int"
                                                    class="form-control @error('user_id') is-invalid @enderror"
                                                    name="user_id" value="{{ Auth::user()->id }}" hidden required autocomplete="location"
                                                    autofocus>
                                                <input id="name" type="int"
                                                    class="form-control @error('medicine_id') is-invalid @enderror"
                                                    name="medicine_id" value="" hidden required autocomplete="medicine_id"
                                                    autofocus>
                                            </div>
                                        

                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-success">
                                                        {{ __('Check Out') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- End of form --}}
                    <div class="spacing"></div>

                </div>

            </div>

        </div>


        <div class="middle-section flex justify-center sm:items-center">
            <div class="pink-ring"></div>
            <div class="blue-ring"></div>
            <div>
                <h1>COMMUNICATION IS THE KEY</h1>
                <p>Best Pharmacy platform in Ghana</p>
                <button type="button" class="btn btn-buy-now">Learn more</button>
            </div>
        </div>




    </div>
@endsection
