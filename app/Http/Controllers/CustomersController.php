<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.user_profile', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view ('user.update_user_profile',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //  Cover image
    //     // $coverImage = $request->file('cover_image');
    //     $coverImage = time() . '-' . $request->input('cover_image') . '.'.
    //     $request->cover_image->extension();
    //     // $request->image->move(public_path('images'), $coverImage);
        
    //     //Profile image 
    //     $profile_image = time() . '-'. $request->file('profile_image') . '.'.
    //     $request->cover_image->extension();
    //     // $request->image->move(public_path('images'), $profile_image);
    //     dd($coverImage);


    //     $user = User::where('id',$id)
    //         ->update([
    //         'name'  => $request->input('name'),
    //         'email' => $request->input('email'),
    //         // Additional information
    //         'profile_image' => $request->file('profile_image'),
    //         'cover_image' => $request->file('cover_image'),
    //         'address' => $request->input('address'),
    //         'phone' => $request->input('phone'),
    //         'region' => $request->input('region'),
    //         'city' => $request->input('city'),
    //         'postal_code' => $request->input('postal_code'),
    //     ]);
    //     // dd($user);
    //     return redirect()->back()->with('success', 'user profile has been updated sucessfull');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
