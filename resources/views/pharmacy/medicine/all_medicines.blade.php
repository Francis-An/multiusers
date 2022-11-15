@extends('layouts.app')

@section('content')
@include('flash-message')
    <div class="container mt-3">
        <h2 class="mb-4">Medicines</h2>
        @can('isPharma')
            <a href="/medicines/create" class="btn btn-success mb-3">Add Medicine</a>
        @endcan
        <table class="table medicine">
            <thead>
                <tr>
                    @can('isAdmin')
                        
                    <th>Pharmacy</th>
                    @endcan
                    <th>Drug Photo</th>
                    <th>Generic name</th>
                    <th>instructions</th>
                    <th>Manufacture</th>
                    <th>description</th>
                    <th>Dos</th>
                    <th>Dos Unit</th>
                    <th>Price</th>
                    <th>Available</th>
                    <th>Start Date</th>
                    <th>Expiry Date</th>
                    {{-- @can('isPharma') --}}
                        <th>Action</th>
                    {{-- @endcan --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($medicines as $medicine)
                    @if (Auth::user()->role == 'pharma')
                        @can('view', $medicine)
                            <tr>
                                <td>
                                    <div class="col-2 btn">

                                        <a style="text-decoration:none;color:black" href="/medicines/{{ $medicine->id }}">
                                            <img src="{{ asset('images/' . $medicine->image) }}" class="cart-product-imag"
                                                width="50">
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $medicine->generic_name }}</td>
                                <td class="tb">{{ $medicine->instructions }}</td>
                                <td>{{ $medicine->manufacture }}</td>
                                <td class="tb">{{ $medicine->description }}</td>
                                <td>{{ $medicine->drug_dosage }}</td>
                                <td>{{ $medicine->drug_dosage_unit }}</td>
                                <td>{{ $medicine->price }}</td>
                                <td>{{ $medicine->available }}</td>
                                <td>{{ $medicine->starting_date }}</td>
                                <td>{{ $medicine->expiry_date }}</td>
                                <td class="last">
                                    @can('view', $medicine)
                                        <a href="/medicines/{{ $medicine->id }}" class="btn btn-info mb-3">View</a>
                                    @endcan
                                    <a href="/medicines/{{ $medicine->id }}/edit" class="btn btn-primary mb-3">Edit</a>
                                    @can('delete', $medicine)
                                        <form class="del" action="/medicines/{{ $medicine->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger mb-3 ">delete</button>
                                        </form>
                                    @endcan
                                    {{-- <a href="/medicines/{{ $medicine->id }}" class="btn btn-danger mb-3">Delete</a> --}}
                                </td>
                            </tr>
                        @endcan
                    @elseif(Auth::user()->role == 'admin')
                        <tr>
                            <td>{{ $medicine->users->name }}</td>
                            <td>{{ $medicine->generic_name }}</td>
                            <td>{{ $medicine->instructions }}</td>
                            <td>{{ $medicine->manufacture }}</td>
                            <td>{{ $medicine->description }}</td>
                            <td>{{ $medicine->dose }}</td>
                            <td>{{ $medicine->dose_unit }}</td>
                            <td>{{ $medicine->price }}</td>
                            <td>{{ $medicine->available }}</td>
                            <td>{{ $medicine->starting_date }}</td>
                            <td>{{ $medicine->expiry_date }}</td>
                            <td>
                               
                                    <a href="/medicines/{{ $medicine->id }}" class="btn btn-info mb-3">View</a>
                               
                                {{-- <a href="/medicines/{{ $medicine->id }}/edit" class="btn btn-primary mb-3">Edit</a> --}}
                                
                                    <form class="del" action="/medicines/{{ $medicine->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger mb-3 ">delete</button>
                                    </form>
                                
                                {{-- <a href="/medicines/{{ $medicine->id }}" class="btn btn-danger mb-3">Delete</a> --}}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
