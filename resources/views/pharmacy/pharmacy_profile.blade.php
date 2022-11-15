@extends('layouts.app')

@section('content')
    {{-- Profile and cover image --}}
    <div class="container profile-info">

        <div class="col cover py-3">
            <img id="coverPreview" src="{{ asset('images/' . $pharmacy->cover_image) }}" width="100%" height="200" alt="">
        </div>
        <div class="row">
            <div class="col profile mx-5">
                <img id="profilePreview" src="{{ asset('images/' . $pharmacy->profile_image) }}" alt="">
                {{-- <span class="btn btn-outline-secondary btn-file">
                    Edit Profile <input id="uploadProfile" type="file">
                </span> --}}
            </div>
            @can('view',$pharmacy)
                <div class="col edit-btn text-end">
                <a href="/users/{{ $pharmacy->id }}/edit" class="btn btn-outline-secondary btn-file">
                    {{-- <input id="uploadCover" type="file"> --}}
                     Edit Profile
                </a>
            </div>
            @endcan
        </div>
        @can('view',$pharmacy)
            <div class="col edit-btn text-end py-2">
        <a href="/change/{{ $pharmacy->id }}/edit" class="btn edit-btn btn-outline-secondary btn-file text-end">
            {{-- <input id="uploadCover" type="file"> --}}
            Change password
        </a>
        @endcan
    </div>


    <div class="container">
        <div class="row py-3">
            <div class="col-sm col-lg-6">
                <table class="table table-borderless">
                    {{-- One column --}}
                    <tr>
                        <td>
                            <img src="{{ asset('storage/store_black_24dp.svg') }}" alt="">
                            Company Name
                        </td>
                    </tr>
                    <tr>

                        <th class="ps-5 pb-4 h2 ">{{ $pharmacy->name }}</th>

                    </tr>
                    {{-- End One column --}}
                    {{-- One column --}}
                    <tr>
                        <td>
                            <img src="{{ asset('storage/location_on_black.svg') }}" alt="">
                            Location
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-5 pb-4 h2 ">{{ $pharmacy->address }}</th>
                    </tr>
                    {{-- End One column --}}
                    {{-- One column --}}
                    <tr>
                        <td>
                            <img src="{{ asset('storage/badge_black_24dp.svg') }}" alt="">
                            Liscence
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-5 pb-4 h2 ">{{ $pharmacy->liscence }} </th>
                    </tr>
                    {{-- End One column --}}
                    {{-- One column --}}
                    <tr>
                        <td>
                            <img src="{{ asset('storage/calendar_today_black_24dp.svg') }}" alt="">
                            Founded
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-5 pb-4 h2 ">{{ $pharmacy->founded }} </th>
                    </tr>
                    {{-- End One column --}}
                    {{-- One column --}}
                    <tr>
                        <td>
                            <img src="{{ asset('storage/calendar_today_black_24dp.svg') }}" alt="">
                            Bio
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-5 pb-4 h2 border">
                             {{ $pharmacy->bio }}
                        </th>
                    </tr>
                    {{-- End One column --}}
                </table>
            </div>
            <div class="col-sm col-lg-6">
                <table class="table table-borderless">
                    {{-- One column --}}
                    <tr>
                        <td>
                            <img src="{{ asset('storage/perm_identity_black_24dp.svg') }}" alt="">
                            Owner
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-5 pb-4 h2 ">{{ $pharmacy->owner_name }}</th>
                    </tr>
                    {{-- End One column --}}
                    {{-- One column --}}
                    <tr>
                        <td>
                            <img src="{{ asset('storage/email_black_24dp.svg') }}" alt="">
                            Email
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-5 pb-4 h2 ">{{ $pharmacy->email }}</th>
                    </tr>
                    {{-- End One column --}}
                    {{-- One column --}}
                    <tr>
                        <td>
                            <img src="{{ asset('storage/phone_black_24dp.svg') }}" alt="">
                            Phone
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-5 pb-4 h2 ">{{ $pharmacy->phone }} </th>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('storage/phone_black_24dp.svg') }}" alt="">
                            City
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-5 pb-4 h2 ">{{ $pharmacy->city }} </th>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('storage/phone_black_24dp.svg') }}" alt="">
                            Region
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-5 pb-4 h2 ">{{ $pharmacy->region }} </th>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('storage/phone_black_24dp.svg') }}" alt="">
                            Postal Code
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-5 pb-4 h2 ">{{ $pharmacy->postal_code }} </th>
                    </tr>
                    {{-- End One column --}}

                </table>
            </div>
        </div>
    </div>
@endsection
