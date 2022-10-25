@extends('layouts.app')

@section('content')
    

    <div class="container bg-white">
        <h1 class="p-3"> Pharmacy Profile</h1>
        
        <div class="row py-3">
            
            <form action="/pharmacies" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('get') --}}
                {{-- Profile and cover image --}}
                <div class="container profile-info">
        
                    <div class="col cover py-3">
                        <img id="coverPreview" src="{{ asset('storage/house.jpg') }}" width="100%" height="200" alt="">
                    </div>
                    <div class="row">
                        <div class="col profile mx-5">
                            <img id="profilePreview" src="{{ asset('storage/user.jpg') }}" alt="">
                            <span class="btn btn-outline-secondary btn-file">
                                <img src="{{ asset('storage/photo_camera_black_18dp.svg') }}" alt=""> 
                                <input id="uploadProfile" type="file" name="profile_image">
                            </span>
                        </div>
                        <div class="col edit-btn text-end">
                            <span class="btn btn-outline-secondary text-center btn-file">
                                Edit Cover <input id="uploadCover" type="file" name="cover_image">
                            </span>
                        </div>
                    </div>
                </div>
                {{-- End of Image --}}
                <div class="">
                    <div class="row">
                        <div class="col-sm col-lg-6">
                            {{-- <input id="uploadImage" type="file" class="form-control my-3" name="profile_image"> --}}
                            <div>
                                <label for="name">Company Name</label>
                                <input type="text" class="form-control my-3"  name="company_name" value="{{ Auth::user()->name }}">
                            </div>
                            <div>
                                <label for="location">Location</label>
                                <input type="text" class="form-control my-3"  name="location">
                            </div>
                            <div>
                                <label for="liscence">Liscence</label>
                                <input id="uploadImage" type="file" class="form-control my-3" name="liscence">

                            </div>
                            <div>

                                <label for="start-date">Started date</label>
                                <input type="date" class="form-control my-3" min="1899-01-31" max="2023-12-01"
                                    name="start-date">
                            </div>
                            <div>
                                <label for="bio">Bio</label>
                                <textarea class="form-control" name="bio" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-sm col-lg-6">
                            <div>
                                <label for="owner">Owner</label>
                                <input type="text" class="form-control my-3" name="owner" >

                            </div>
                            <div>
                                <label for="email">Email</label>
                                <input type="email" class="form-control my-3" name="email" value="{{ Auth::user()->email }}">

                            </div>
                            <div>
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control my-3" name="phone" >

                            </div>
                        </div>

                        <div class="col my-3">
                            <button type="submit" class="btn btn-success">
                                {{ __('Update') }}
                            </button>
                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection
