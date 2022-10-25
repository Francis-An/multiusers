@extends('layouts.app')

@section('content')
    @include('flash-message')
    <div class="min-h-screen">
        
        <!-- spacing -->
        <div class="container">
            <div class="h-8"></div>
        </div>

       
        <!-- spacing -->

        <hr />

        <div class="container-fluid">
            <h2>Search Results</h2>
            <h4>Of {{ $search_item }} ....... </h4>
            <div class="jumbotron bg-white p-4 mt-3">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-7"></div>
                    
                </div>

                <!-- spacing -->
                <div class="mt-8"></div>

                <div class="row">

                    <h1>No Drug Found for your search ..........</h1>


                </div>

            </div>
        </div>
    </div>

    <!-- spacing -->
    <div class="mt-8"></div>
    </div>
@endsection
