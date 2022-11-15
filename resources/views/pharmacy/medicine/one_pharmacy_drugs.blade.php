@extends('layouts.app')

@section('content')
    @include('cart_errors')
    <div class="min-h-screen">
       

        <!-- spacing -->
        <div class="container">
            <div class="h-8"></div>
        </div>

        <div class="container">
            <div class="jumbotron">
                <h2>{{ $pharmacy->name }}</h2>

                <!-- spacing -->


                <div class="row">

                    @foreach ($pharmacy->medicines as $medicine)
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
                                        {{ $medicine->users->name }}
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
                                                <a href="{{ route('login') }}" style="width:120px"
                                                    class="btn  btn-primary btn-atc cart-btn">
                                                    Add To Cart
                                                </a>
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

        
    </div>

    <!-- spacing -->
    <div class="mt-8"></div>
    </div>
@endsection
