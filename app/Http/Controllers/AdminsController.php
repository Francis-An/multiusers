<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Hash;


class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies = User::where('role', '=', 'pharma')->get();
        
        return view('admin.pharmacies', [
            'users' => $pharmacies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('isAdmin') ? Response::allow() :abort(403)){
            return view('admin.resgister_pharmacy');
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'string|min:10',
            'liscence' => 'required',
            'founded' => 'date',
            'phone' => 'required|numeric|min:10',
            'bio' => 'string|min:20',
            'region' => 'required',
            'city' => 'required',
            // 'postal_code' => 'required|string|min:8',
        
        ]);

        $pharmacy = User::create([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'pharma',
            'password' => Hash::make($request->input('password')),
            // Additional information
            'owner_name' => $request->input('owner_name'),
            // 'profile_image' => $request->input('profile_image'),
            // 'cover_image' => $request->input('cover_image'),
            // 'address' => $request->input('address'),
            'liscence' => $request->input('liscence'),
            // 'founded' => $request->input('founded'),
            'phone' => $request->input('phone'),
            // 'bio' => $request->input('bio'),
            'region' => $request->input('region'),
            'city' => $request->input('city'),
            // 'postal_code' => $request->input('postal_code'),
        ]);
        // dd($pharmacy);
        return redirect()->back()->with('success', 'Pharmacy is add sucessfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

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
