@extends('layouts.app')

@section('content')
    @include('flash-message')
    <div class="container mt-3">
        <h2 class="mb-4">Pharmacies</h2>

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
                @foreach ($users as $user)
                    {{-- @if (Auth::user()->role == 'user' || Auth::user()->role == 'admin') --}}
                    @unless (Auth::user()->role == 'pharma')
                        {{-- @can('view', $user) --}}
                            <tr>
                                <td class="btn btn-light">
                                    <a style="text-decoration:none;color:black" href="/users/{{ $user->id }}">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td class="">{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td class="">{{ $user->address }}</td>
                                <td>{{ $user->region }}</td>
                                <td>{{ $user->city }}</td>
                                <td>{{ $user->postal_code }}</td>
                                <td class="">
                                    {{-- @can('view', $user) --}}
                                        <a href="/users/{{ $user->id }}" class="btn btn-success mb-3 text-white">Store</a>
                                        {{-- <a href="/users/{{ $user->id }}" class="btn btn-info mb-3 text-white">View Profile</a> --}}
                                    {{-- @endcan --}}
                                    @can('isAdmin')
                                        <form class="  " action="/users/{{ $user->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger mb-3 ">delete</button>
                                        </form>
                                    @endcan
                                    {{-- <a href="/medicines/{{ $medicine->id }}" class="btn btn-danger mb-3">Delete</a> --}}
                                </td>
                            </tr>
                        {{-- @endcan --}}
                        @endunless
                        
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
