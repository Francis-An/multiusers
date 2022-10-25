<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\Models\User;
use App\Models\Medicine;

class PharmaciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies = Pharmacy::all();
        // dd($pharmacies);
        // return view('pharmacy.pharmacy_profile')->with('pharmacies',$pharmacies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacy.forms.create_pharmacy_profile_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Profile Image
        $profileImage = time() . '-' . $request->name . '.' . 
        $request->image->extension();
        $name=$request->image->move(public_path('images'), $profileImage);
        
        // Cover image
        // $coverImage = time() . '-' . $request->name . '.' . 
        // $request->image->extension();
        // $request->image->move(public_path('images'), $coverImage);

        // $name = $request->input('profile_image');

        dd($name);

        // $pharmacy = ([
        //     'company_name' => $request->input('company_name'),
        //     'profile_image'=>$request->input('profile_image'),
        //     'cover_image'=>$request->input('cover_image'),
        //     'user_id' => auth()->user(),
        //     'email' => $request->input('email'),
        //     'address' => $request->input('address'),
        //     'phone' => $request->input('phone'),
        //     'liscence' => $request->input('liscence'),
        //     'founded' => $request->input('founded'),
        //     'bio' => $request->input('bio'),
        //     'region' => $request->input('region'),
        //     'city' => $request->input('city'),
        //     'postal_code' => $request->input('postal_code'),
        // ]);

        // dd($pharmacy);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', $id);
        // $pharmacy = Pharmacy::find($id);
        // return view('pharmacy.pharmacy_profile')->with('pharmacy',$pharmacy);
        // return 'Welcome to your profile';
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
        $user = User::where('id',$id)
            ->update([

            ]);
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


    public function pharmacy_profile(Request $user) {
        // $medicine
        return view('pharmacy.pharmacy_profile');
    }

    public function search(Request $request){
        
        $search_item = $request->input('search');
        $data = Medicine::where('generic_name','Like','%'.$search_item. '%')
            ->orWhere('description','Like','%'.$search_item.'%')->get();
        if($data->isNotEmpty()){
            return view('pharmacy.medicine.search_result',[
                'data' => $data,
                'search_item' => $search_item
            ]);
        }else {
            // $empty = 'No Drug found';
                return view('pharmacy.medicine.no_drug_found',[
                        // 'empty' => $empty,                      
                        'search_item' => $search_item,                      
                    ]);
        }
    }
}
