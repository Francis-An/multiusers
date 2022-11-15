@extends('layouts.app')

@section('content')
    @include('flash-message')

    <div class="row mx-4">
        {{-- @foreach ($medicines as $medicine) --}}
            <div class="col-sm-3 ">
                <a class="drug-card" href="/pharmacies">
                    <div class="product card-d bg-light">
                        <img src="{{ asset('/storage/people_alt_black_24dp.svg') }}" alt="" class="product-image" />
                        <div class="product-title text-center">
                            <h3>Total Pharmacies</h3>
                        </div>
                        <div class="product-title text-center">
                            <h1 class="display-1">{{ $total_pharmacies }}</h1>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3 ">
                <a class="drug-card" href="/users">
                    <div class="product card-d bg-light">
                        <img src="{{ asset('/storage/people_alt_black_24dp.svg') }}" alt="" class="product-image" />
                        <div class="product-title text-center">
                            <h3>Total Users</h3>
                        </div>
                        <div class="product-title text-center">
                            <h1 class="display-1">{{ $total_users }}</h1>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3 ">
                <a class="drug-card" href="/medicines">
                    <div class="product card-d bg-light">
                        <img src="{{ asset('/storage/people_alt_black_24dp.svg') }}" alt="" class="product-image" />
                        <div class="product-title text-center">
                            <h3>Total Drugs</h3>
                        </div>
                        <div class="product-title text-center">
                            <h1 class="display-1">{{ $total_drugs }}</h1>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3 ">
                <a class="drug-card" href="/medicines/">
                    <div class="product card-d bg-light">
                        <img src="{{ asset('/storage/people_alt_black_24dp.svg') }}" alt="" class="product-image" />
                        <div class="product-title text-center">
                            <h3>Report</h3>
                        </div>
                        <div class="product-title text-center">
                            <h1 class="display-1">24</h1>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                </a>
            </div>
        {{-- @endforeach --}}


    </div>
@endsection
