@extends('layouts.app')

@section('content')
    @include('cart_errors')
    <div class="container">
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 border-end">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="main_image"> <img src="{{ asset('images/' . $medicine->image) }}"
                                    id="main_product_image" width="350"> </div>
                            <div class="thumbnail_images">

                                <div>
                                    <h3 class="text-center pt-2">Drug Details</h3>
                                    <p class="text-center text-justify">
                                        {{ $medicine->description }}
                                    </p>
                                </div>
                                <div class="px-3 py-2 text-justify">
                                    <hr>
                                    <h3 class="text-center pt-2">Drug instructions</h3>
                                    <p class="text-center text-justify">
                                        {{ $medicine->instructions }}
                                    </p>
                                    <div class="col">
                                        @can('isUser')
                                            <a href="/home" class="btn btn-primary">&LeftArrow; Continue shopping</a>
                                        @else
                                            @if (Auth::user())
                                                <a href="/home" class="btn btn-primary">&LeftArrow; Back</a>
                                            @else
                                                <a href="/products" class="btn btn-primary">&LeftArrow; Back</a>
                                            @endif
                                            @can('view', $medicine)
                                                <form class="del" action="/medicines/{{ $medicine->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger mb-3">delete</button>
                                                </form>
                                            @endcan
                                        @endcan
                                    </div>
                                </div>

                                {{-- </ul> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 right-side">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>{{ $medicine->generic_name }}</h3> <span class="heart"><img
                                        src="{{ asset('/storage/love.svg') }}" alt=""></span>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <p>{{ $medicine->description }}</p>
                            </div>
                            <h3>{{ $medicine->price }}</h3>
                            <div class="ratings d-flex flex-row align-items-center">
                                <div class="d-flex flex-row"> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i
                                        class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bx-star'></i>
                                </div> <span>441 reviews</span>
                            </div>
                            <div class="mt-5">
                                <div class="colors">
                                    <div class="px-3 py-2 text-justify">
                                        <hr>
                                        <h3 class="text-center pt-2">Available in</h3>
                                        {{-- <form action="{{ route('pharmacy.profile') }}" method="POST" class=""> --}}
                                        {{-- @csrf --}}
                                        <input type="int" name="medicine_id" value="{{ $medicine->users->id }}" hidden>
                                        <div class="text-center text-justify">
                                            <a class="btn btn-info text-white p-4 text-uppercase" type="submit"
                                                href="/users/{{ $medicine->users->id }}" name="medicine_id"
                                                value="">{{ $medicine->users->name }}</a>
                                        </div>

                                        {{-- </form> --}}
                                    </div>
                                    <div class="px-3 py-2 text-justify">
                                        <hr>
                                        <h3 class="text-center pt-2">manufacture</h3>
                                        <p class="text-center text-justify">
                                            {{ $medicine->manufacture }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @can('isUser')
                                <div class="buttons d-flex flex-row mt-5 gap-3">
                                    <button class="btn btn-outline-dark">BuyNow</button>
                                    {{-- <button class="btn add-cart">Add to Cart</button>  --}}
                                    <form action="/carts" method="POST" class="">
                                        @csrf
                                        <div>
                                            @can('isUser')
                                                <input type="submit" class="btn add-cart" value="Add To Cart">
                                            @endcan
                                        </div>
                                        <input type="int" name="quantity" value="1" hidden>
                                        <input type="int" name="total_amount" value="{{ $medicine->price }}" hidden>
                                        <input type="int" name="medicine_id" value="{{ $medicine->id }}" hidden>
                                        <input type="int" name="price" value="{{ $medicine->price }}" hidden>
                                        <input type="text" name="medicine_name" value="{{ $medicine->generic_name }}"
                                            hidden>

                                    </form>
                                </div>
                            @endcan
                            <div class="search-option"> <img src="{{ asset('storage/search_white_24dp.svg') }}"
                                    alt="">
                                <div class="inputs"> <input type="text" name=""> </div> <img
                                    src="{{ asset('storage/share_white_24dp.svg') }}" alt="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-white p-3">
        <h2 class="text-justify-center">Prescription</h2>
        <hr>
        <p class="text-justify-center p-5">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam excepturi laudantium,
            mollitia eveniet delectus ab eum unde? Aspernatur et architecto nostrum impedit fugit
            cumque quas omnis, minus sed laudantium? Illo, delectus assumenda maiores hic, quas quam,
            blanditiis ex sequi sunt ut molestias dicta. Quos iusto, officia quaerat voluptates repudiandae delectus.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam excepturi laudantium,
            mollitia eveniet delectus ab eum unde? Aspernatur et architecto nostrum impedit fugit
            cumque quas omnis, minus sed laudantium? Illo, delectus assumenda maiores hic, quas quam,
            blanditiis ex sequi sunt ut molestias dicta. Quos iusto, officia quaerat voluptates repudiandae delectus.
        </p>
    </div>
@endsection
