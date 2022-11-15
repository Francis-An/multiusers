@extends('layouts.app')

@section('content')
    @include('flash-message')
    <div class="container mt-3">
        <h2 class="mb-4">Orders</h2>

        <table class="table">
            <thead>
                <tr>
                    @can('isAdmin')
                        <th>Orders</th>
                    @endcan
                    <th>Photo</th>
                    <th>Medicine Name</th>
                    @if (Auth::user()->role == 'pharma')
                        <th>Customer Name</th>
                        <th>Location</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                    @else
                        <th>Pharmacy</th>
                    @endif
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                    {{-- @can('isPharma') --}}
                    <th>Action</th>
                    {{-- @endcan --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    @if (Auth::user()->role == 'user')
                        @if (Auth::user()->id == $order->user_id)
                            {{-- @can('view', $order) --}}
                            <tr>
                                <td>
                                    <div class="col-2 btn">

                                        <a style="text-decoration:none;color:black" href="/medicines/{{ $order->medicines->id }}">
                                            <img src="{{ asset('images/' . $order->medicines->image) }}" class="cart-product-imag"
                                                width="50">
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $order->medicines->generic_name }}</td>
                                <td class="btn btn-light"><a style="text-decoration:none;color:black" href="">
                                    {{ $order->medicines->users->name }}</a>
                                </td>
                                @if (Auth::user()->role == 'pharma')
                                    {{-- <td>{{ $order->location }}</td> --}}
                                    {{-- <td>{{ $order->phone }}</td> --}}
                                    <td>{{ $order->users->email }}</td>
                                @endif
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    @if ($order->status == 'pending')
                                        Pendding
                                    @elseif ($order->status == 'Delivered')
                                        <p>Delivered</p>
                                    @elseif ($order->status == 'Cancelled')
                                        <p>Cancelled</p>
                                    @elseif($order->status == 'Ready')
                                        <p>Ready</p>
                                    @elseif($order->status == 'Re-Order')
                                        
                                            Re-Ordered
                                    @endif
                                </td>
                                <td>
                                    {{-- @can('view', $medicine) --}}
                                    <a href="/cancel/{{ $order->id }}" class="btn btn-info mb-3">View</a>
                                    {{-- @endcan --}}
                                    @if ($order->status == 'pending' || $order->status == 'Re-Order')
                                        <a href="{{ url('cancelled/' . $order->id) }}"
                                            class="btn btn-primary mb-3">Cancelled</a>
                                    @elseif ($order->status == 'Cancelled' || $order->status == 'Delivered')
                                        <a href="{{ url('change-status/' . $order->id) }}"
                                            class="btn btn-info mb-3">Reorder</a>
                                        <form class="del" action="/orders/{{ $order->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger mb-3 ">Delete</button>
                                        </form>
                                    @endif

                                   

                                    {{-- @endcan --}}
                                    {{-- <a href="/medicines/{{ $medicine->id }}" class="btn btn-danger mb-3">Delete</a> --}}
                                </td>
                            </tr>
                            {{-- @endcan --}}
                        @endif
                    @elseif (Auth::user()->role == 'pharma')
                        @if (Auth::user()->id == $order->medicines->user_id)
                            {{-- @can('view', $order) --}}
                            <tr>
                                <td>
                                    <div class="col-2">

                                        <img src="{{ asset('images/' . $order->medicines->image) }}"
                                            class="cart-product-imag" width="50">
                                    </div>
                                </td>
                                <td>{{ $order->medicines->generic_name }}</td>
                                <td class="btn btn-light">
                                    <a style="text-decoration:none;color:black" href="/users/{{ $order->users->id }}">
                                        {{ $order->users->name }}
                                    </a>
                                </td>
                                <td>{{ $order->users->address }}</td>
                                <td>{{ $order->users->phone }}</td>
                                <td>{{ $order->users->email }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    @if ($order->status == 'pending')
                                        <a href="{{ url('change-status/' . $order->id) }}"
                                            class="btn btn-light">Pendding</a>
                                    @elseif ($order->status == 'Delivered')
                                        <p>Delivered</p>
                                    @elseif ($order->status == 'Cancelled')
                                        <p>Cancelled</p>
                                    @elseif($order->status == 'Ready')
                                        <a href="{{ url('change-status/' . $order->id) }}"
                                            class="btn btn-success">Ready</a>
                                    @elseif($order->status == 'Re-Order')
                                        <a href="{{ url('change-status/' . $order->id) }}"
                                            class="btn btn-success">Re-Ordered</a>
                                    @endif
                                </td>

                                <td>
                                    {{-- @can('view', $medicine) --}}
                                    <a href="/cancel/{{ $order->id }}" class="btn btn-info mb-3">View</a>
                                    {{-- @endcan --}}
                                    @if ($order->status == 'pending' || $order->status == 'Re-Order')
                                        <a href="{{ url('cancelled/' . $order->id) }}"
                                            class="btn btn-primary mb-3">Cancelled</a>
                                    
                                        
                                    @endif
                                    @if ($order->status != 'Ready')
                                        <form class="del" action="/orders/{{ $order->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger mb-3 ">Delete</button>
                                        </form>
                                    @endif

                                    

                                    {{-- @endcan --}}
                                    {{-- <a href="/medicines/{{ $medicine->id }}" class="btn btn-danger mb-3">Delete</a> --}}
                                </td>
                            </tr>
                            {{-- @endcan --}}
                        @endif
                    @else
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
