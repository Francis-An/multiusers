@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        {{-- Hero box --}}
        <div class="row product-hero">
            <div class="container">
                <div class="col-md-6">
                    <h1 class="font display-1 py-5">
                        YOU WILL GET <br>
                        THE QUALITY <br>
                        HERER
                    </h1>
                </div>
            </div>


        </div>
        {{-- End of Hero --}}

        {{-- Recent card --}}
        {{-- Cards --}}
        <div class="container py-0 mt-5 pt-4">
            <h1 class="font">Recent Drugs</h1>
            <div class="row">
                {{-- One Card --}}
                @foreach ($latests as $latest)
                    <div class="col-sm-12 col-md-5 col-lg-3 py-3 m-0">
                        <div class="card ">
                            <img class="card-img-bottom" src="{{ asset('storage/drug.jpg') }}" alt="Card image"
                                style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">{{ $latest->generic_name }}</h4>
                                <p class="card-text">{{ $latest->pharmacies->name }}</p>
                                <p class="card-text">Category</p>
                                <h4 class="card-title">GHC150.00</h4>
                                <a href="#" class="btn btn-primary">Add To Cart</a>
                                <a href="#" class="btn btn-danger">delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- End of one card --}}

            </div>
            {{-- End of recent Card --}}


            {{-- Products --}}
            <div class="container-fluid bg-white py-4">
                <div class="container">
                    <h1 class="font">Products</h1>
                    <div class="row">
                        {{-- One Card --}}
                        @foreach ($medicines as $medicine)
                            <div class="col-sm-12 col-md-6 col-lg-3 py-3">
                                <div class="card ">
                                    <img class="card-img-bottom" src="{{ asset('storage/6.jpg') }}" alt="Card image"
                                        style="width:100%">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $medicine->generic_name }}</h4>
                                        <p class="card-text">{{ $medicine->pharmacies->name }}</p>
                                        <p class="card-text">Category</p>
                                        <h4 class="card-title">GHC150.00</h4>
                                        <a href="#" class="btn btn-primary">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- End of one card --}}

                    </div>
                </div>
            </div>

            {{-- End of products --}}
        @endsection
