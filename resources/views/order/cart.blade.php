@extends('layouts.app')

@section('content')
    @include('cart_errors')



    <div class="min-h-screen">

        <div class="tbl-wrapper mb-5">

            <div class="container">

                <div class="spacing"></div>


                <div class="row mb-5">
                    {{-- Order Form --}}

                    <!-- left side -->
                    <div class="left col-8 ">

                        <div class="row">

                            <div class="col-2">
                                <h2>Shopping Cart</h2>
                            </div>

                            <!-- spacing -->
                            <div class="col-8"></div>

                            <div class="col-2">
                                <h2>Order</h2>
                            </div>

                        </div>

                        <hr>



                        <div class="row product-row">
                            <div class="col-6">

                                <div class="row">

                                </div>

                            </div>


                        </div>

                        <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Detail</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        @can('view', $cart)
                                            <tr>
                                                <td class="m-0">
                                                    <div class="col-2">

                                                        <img src="{{ asset('images/' . $cart->medicines->image) }}" alt=""
                                                            class="cart-product-image">
                                                    </div>
                                                    <div class="cart-product-title">
                                                        Fjallraven - Foldsack
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="cart-items-count">
                                                        <div class="col-2 quantity">
                                                            <form action="/carts/{{ $cart->id }}" method="POST">
                                                                @csrf
                                                                @method('patch')
                                                                <input type="number"
                                                                    style="width: 70px; border:none;color:black" name="quantity"
                                                                    value="{{ $cart->quantity }}">
                                                                <input type="int"
                                                                    style="width: 70px; border:none;color:black" name="price"
                                                                    value="{{ $cart->price }}" hidden>
                                                                <input type="int"
                                                                    style="width: 70px; border:none;color:black" name="medicine_id"
                                                                    value="{{ $cart->medicines->id }}" hidden>
                                                                <button type="submit"
                                                                    class="btn btn-warning mt-2 text-white">update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-2 cart-items-cost">{{ $cart->price }}</div>
                                                </td>
                                                <td>
                                                    <div class="col-3 cart-items-cost">
                                                        {{-- <br> --}}
                                                        {{ $cart->total_amount }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="/carts/{{ $cart->id }}" method="POST"
                                                        class="btn text-start">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn bg-danger text-white">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endcan
                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                        <div class="spacing"></div>

                        <div class="p-6 continue-shopping">
                            <a href="{{ route('home') }}" class="btn">
                                <button class="btn btn-primary">
                                    <- Continue Shopping</button>
                        </div>
                        </a>

                    </div>

                    <!-- right side -->

                    <div class="right col-4">
                        <h2>Order Summary</h2>

                        <hr>

                        <div class="summary-list">
                            <div class="row">
                                <div class="col-4 cart-items-count">Items {{ $total_carts }}</div>
                                <div class="col-4"></div>
                                <div class="col-4 cart-items-cost">{{ $amount_to_pay }}</div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-4 cart-items-count"></div>
                            <div class="col-4"></div>
                            <div class="col-4">
                                <h4 class="text-danger">Total Cost</h4> 
                                <div class="col-7 cart-items-cost">
                                
                                {{ $amount_to_pay }}
                            </div>
                            </div>
                        </div>
                        <form action="/orders" method="POST">
                            @csrf
                            {{-- <input name="quantity" type="int" hidden value="{{ $cart->quantity }}"> --}}
                            {{-- <input name="price" type="int" hidden value="{{ $amount_to_pay }}"> --}}

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary mt-5">Check Out</button>
                            </div>
                        </form>

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

    <div class="container-fluid mt-3">
        <div class="jumbotron bg-white">

            <div class="row">
                <div class="col-2">
                    <h2>The Latest</h2>
                </div>
            </div>


            <!-- spacing -->
            <div class="mt-8"></div>

            <div class="row">
                @foreach ($latests as $medicine)
                <div class="col-sm-3">
                    <a class="drug-card" href="/medicines/{{ $medicine->id }}">
                        <div class="product card-d bg-light">
                            <img src="{{ asset('images/' . $medicine->image) }}" alt="" class="product-image" />
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
                                    @can('isUser')
                                        <input type="submit" class="btn btn-primary btn-atc cart-btn" value="Add To Cart">
                                    @endcan
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
    </div>



    </div>
@endsection
