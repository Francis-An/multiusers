@extends('layouts.app')

@section('content')
    @include('flash-message')
    <div class="container mt-3">
        <h2 class="mb-4">Users</h2>

        <table class="table medicine">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Region</th>
                    <th>City</th>
                    <th>Posta Code</th>
                    {{-- @can('isPharma') --}}
                    <th>Action</th>
                    {{-- @endcan --}}
                </tr>
            </thead>
            <tbody>
                @foreach ((Auth::user()->order)->unique('user_id')->all() as $order)
                        @if (Auth::user()->role == 'pharma')
                            <tr>
                                <td class="btn btn-light">
                                    <a style="text-decoration:none;color:black" href="/users/{{ $order->users->id }}">
                                        {{ $order->users['name'] }}
                                    </a>
                                </td>
                                <td class="tb">{{ $order->users->email }}</td>
                                <td>{{ $order->users->phone }}</td>
                                <td class="tb">{{ $order->users->address }}</td>
                                <td>{{ $order->users->region }}</td>
                                <td>{{ $order->users->city }}</td>
                                <td>{{ $order->users->postal_code }}</td>
                                <td class="last">
                                    <a href="/users/{{ $order->users->id }}" class="btn btn-info mb-3">View</a>
                                    @can('isAdmin')
                                        <form class="del" action="/users/{{ $order->users->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger mb-3 ">delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                         @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
