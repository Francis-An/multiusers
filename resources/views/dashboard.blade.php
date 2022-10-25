@extends('layouts.app')

@section('content')
    @include('cart_errors')
    <div class="min-h-screen">
        <div class="banner">
            You will get <br />
            the Quality <br />
            Here
        </div>

        <!-- spacing -->
        <div class="container">
            <div class="h-8"></div>
        </div>

        <div class="container">
            <div class="jumbotron">
                <h2>Recent Posts</h2>

                <!-- spacing -->


                <div class="row">

                    @foreach ($latests as $medicine)
                        <div class="col-sm-3">
                            <a class="drug-card" href="/medicines/{{ $medicine->id }}">
                                <div class="product card-d bg-light">
                                    <img src="{{ asset('images/' . $medicine->image) }}" alt=""
                                        class="product-image" />
                                    <div class="product-title text-center">
                                        {{ $medicine->generic_name }}
                                    </div>
                                    <div class="product-title text-center">
                                        {{-- {{ $medicine->generic_name }} --}}
                                        Pharmacy Name
                                    </div>
                                    <div class="product-price text-center">{{ $medicine->price }}</div>
                                    <form action="/carts" method="POST" class="">
                                        @csrf
                                        <div>
                                            
                                            @if (Auth::user())
                                                @can('isUser')
                                                    <input type="submit" class="btn btn-primary btn-atc cart-btn"
                                                        value="Add To Cart">
                                                @endcan
                                            @else
                                                <input type="submit" class="btn btn-primary btn-atc cart-btn"
                                                    value="Add To Cart">
                                            @endif
                                        </div>
                                        <input type="int" name="quantity" value="1" hidden>
                                        <input type="int" name="total_amount" value="{{ $medicine->price }}" hidden>
                                        {{-- <input type="int" name="user_id" value="{{ Auth::user()}}" hidden> --}}
                                        <input type="int" name="medicine_id" value="{{ $medicine->id }}" hidden>
                                        <input type="int" name="price" value="{{ $medicine->price }}" hidden>
                                        <input type="text" name="medicine_name" value="{{ $medicine->generic_name }}"
                                            hidden>

                                    </form>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>

        <!-- spacing -->

        <hr />

        <div class="container-fluid">
            <div class="jumbotron bg-white">
                <div class="row">
                    <div class="col-2">
                        <h2>Products</h2>
                    </div>
                    <div class="col-7"></div>
                    {{-- <div class="col-3">
                        <div class="search">
                            <i class="ph-magnifying-glass"></i>
                            <input type="text" name="" placeholder="Search products, categories, ..." />
                        </div>
                    </div> --}}
                </div>

                <!-- spacing -->
                <div class="mt-8"></div>

                <div class="row">

                    @foreach ($medicines as $medicine)
                        <div class="col-sm-3">
                            <a class="drug-card" href="/medicines/{{ $medicine->id }}">
                                <div class="product card-d bg-light">
                                    <img src="{{ asset('images/' . $medicine->image) }}" alt=""
                                        class="product-image" />
                                    <div class="product-title text-center">
                                        {{ $medicine->generic_name }}
                                    </div>
                                    <div class="product-title text-center">
                                        {{-- {{ $medicine->generic_name }} --}}
                                        Pharmacy Name
                                    </div>
                                    <div class="product-price text-center">{{ $medicine->price }}</div>
                                    <form action="/carts" method="POST" class="">
                                        @csrf
                                        <div>
                                            @if (Auth::user())
                                                @can('isUser')
                                                    <input type="submit" class="btn btn-primary btn-atc cart-btn"
                                                        value="Add To Cart">
                                                @endcan
                                            @else
                                                <input type="submit" class="btn btn-primary btn-atc cart-btn"
                                                    value="Add To Cart">
                                            @endif
                                        </div>
                                        <input type="int" name="quantity" value="1" hidden>
                                        <input type="int" name="total_amount" value="{{ $medicine->price }}" hidden>
                                        {{-- <input type="int" name="user_id" value="{{ Auth::user()}}" hidden> --}}
                                        <input type="int" name="medicine_id" value="{{ $medicine->id }}" hidden>
                                        <input type="int" name="price" value="{{ $medicine->price }}" hidden>
                                        <input type="text" name="medicine_name" value="{{ $medicine->generic_name }}"
                                            hidden>

                                    </form>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    </div>

    <!-- spacing -->
    <div class="mt-8"></div>
    </div>
@endsection
