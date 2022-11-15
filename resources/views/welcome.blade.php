@extends('layouts.app')

@section('content')
    @include('cart_errors')
    <div class="container-fluid">
        {{-- Hero box --}}
        <div class="row hero">
            <div class="col-md-6 hero-box1 p-0">
                <div class="col hero-box1-lg p-4">
                    <h1 class="font">SHOP ONLINE<br>
                        AND SAVE MORE
                    </h1>

                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium a voluptatum vero perspiciatis
                        inventore remtempore obcaecati quaerat, voluptates quam. Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Laudantium a voluptatum vero perspiciatis inventore remtempore obcaecati quaerat,
                        voluptates quam.
                    </p>
                    <div class="col-md-8 offset-md-4t m-0">

                        <a href=""><button type="submit" class="btn btn-danger md-2 show-btn" type="submit">Shop
                                now</button></a>
                    </div>
                </div>
                <div class="col hero-box1-sm">
                    <img class="small-i" width="600" src="{{ asset('storage/c.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 text-center hero-box2 p-2">
                <img height="450" width="500" class="p-3" src="{{ asset('storage/hero-box2.svg') }}" alt="">
            </div>
        </div>


    </div>
    <div class="container">
        <div class="row p-5">
            <div class="col-md-6 px-4">
                <h1 class=" font">
                    GET THE MEDICINE <br>
                    YOU WANT
                </h1>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium a voluptatum vero perspiciatis
                    inventore remtempore obcaecati quaerat, voluptates quam. Lorem ipsum dolor, sit amet consectetur
                    adipisicing elit. Laudantium a voluptatum vero perspiciatis inventore remtempore obcaecati quaerat,
                    voluptates quam.

                </p>
                <div class="col-md-8 offset-md-4t m-0">

                    <a href=""><button type="submit" class="btn btn-danger md-2 show-btn" type="submit">See
                            plan</button></a>
                </div>
            </div>

            <div class="col-md-6 px-4">
                <ul class="list-group">

                    <li class="row list-group-item py-4 my-4">
                        <span class="med">
                            <img width="40" height="40"
                                src="{{ URL('storage/redeem_black_24dp.svg
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ') }}"
                                alt="">
                        </span>
                        <span class="px-4 h6">Get exclusive perks and rewards
                            for joining our membership plan.
                        </span>
                    </li>
                    <li class="row list-group-item py-4 my-4">
                        <span class="med">
                            <img width="40" height="40" src="{{ URL('storage/wifi_calling_3_black_24dp.svg') }}"
                                alt="">
                        </span>
                        <span class="px-4 h6">Lorem ipsum dolor, sit consectetur adipisicing elit. a voluptatum vero
                            perspiciatis inventore remtem
                        </span>
                    </li>
                    <li class="row list-group-item py-4 my-4">
                        <span class="med">
                            <img width="40" height="40" src="{{ URL('storage/people_alt_black_24dp.svg') }}"
                                alt="">
                        </span>
                        <span class="px-4 h6">Lorem ipsum dolor, sit consectetur adipisicing elit. a voluptatum vero
                            perspiciatis inventore remtem
                        </span>
                    </li>
                    <li class="row list-group-item py-4 my-4">
                        <span class="med">
                            <img width="40" height="40" src="{{ URL('storage/currency_exchange_black_24dp.svg') }}"
                                alt="">
                        </span>
                        <span class="px-4 h6">Access to 24/7 customer support for
                            any technical or billing issues.
                        </span>
                    </li>

                </ul>
            </div>

        </div>
    </div>

    {{-- Communication is the key --}}
    <div class="container-fluid hero-box1 board">
        <div class="container text-center">
            <h1 class="font py-4">
                COMMUNICATION IS THE KEY
            </h1>
            <p class="py-4">Best Pharmacy platform in Ghana
                <a href="">
                    <button type="submit" class="btn btn-danger md-2 show-btn" type="submit">
                        Learn more
                    </button>
                </a>
            </p>
        </div>
    </div>


    {{-- Cards --}}
    <div class="container">


        <h1 class="font">NEW MEDICINE</h1>
        <div class="row">

            @foreach ($medicines as $medicine)
                <div class="col-sm-3">
                    <a class="drug-card" href="/medicines/{{ $medicine->id }}">
                        <div class="product card-d bg-light">
                            <img src="{{ asset('images/' . $medicine->image) }}" alt="" class="product-image" />
                            <div class="product-title text-center">
                                {{ $medicine->generic_name }}
                            </div>
                            <div class="product-title text-center">
                                {{-- {{ $medicine->generic_name }} --}}
                                {{ $medicine->users->name }}
                            </div>
                            <div class="product-price text-center">{{ $medicine->price }}</div>
                            <form action="/carts" method="POST" class="">
                                @csrf
                                <div>
                                    @if (Auth::user())
                                        @can('isUser')
                                            <input type="submit" class="btn btn-primary btn-atc cart-btn" value="Add To Cart">
                                        @endcan
                                    @else
                                        <input type="submit" class="btn btn-primary btn-atc cart-btn" value="Add To Cart">
                                    @endif

                                </div>
                                <input type="int" name="quantity" value="1" hidden>
                                <input type="int" name="total_amount" value="{{ $medicine->price }}" hidden>
                                {{-- <input type="int" name="user_id" value="{{ Auth::user()}}" hidden> --}}
                                <input type="int" name="medicine_id" value="{{ $medicine->id }}" hidden>
                                <input type="int" name="price" value="{{ $medicine->price }}" hidden>
                                <input type="text" name="medicine_name" value="{{ $medicine->generic_name }}" hidden>

                            </form>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>
    </div>
@endsection
