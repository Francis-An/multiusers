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
                @foreach ($users as $user)
                    {{-- @unless(Auth::user()->role == 'user') --}}
                        @if (Auth::user()->role == 'admin')
                            <tr>
                                <td class="btn btn-light">
                                    <a style="text-decoration:none;color:black" href="/users/{{ $user->id }}">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td class="tb">{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td class="tb">{{ $user->address }}</td>
                                <td>{{ $user->region }}</td>
                                <td>{{ $user->city }}</td>
                                <td>{{ $user->postal_code }}</td>
                                <td class="last">
                                    {{-- @can('view', $user) --}}
                                    <a href="/users/{{ $user->id }}" class="btn btn-info mb-3">View</a>
                                    {{-- @endcan --}}
                                    @can('isAdmin')
                                        <form class="del" action="/users/{{ $user->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger mb-3 ">delete</button>
                                        </form>
                                    @endcan
                                    {{-- <a href="/medicines/{{ $medicine->id }}" class="btn btn-danger mb-3">Delete</a> --}}
                                </td>
                            </tr>
                            {{-- @endif --}}
                            {{-- @endcan --}}
                         @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
