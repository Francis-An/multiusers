<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use App\Http\Controllers\MedicinesController;
use App\Http\Requests\AddMedicineRequest;

class MedicinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Medicine $user)
    {
        
        if(Gate::allows('isPharma') || Gate::allows('isAdmin') ? Response::allow() :abort(403)){
            // $this->authorize('view');
            $medicines = Medicine::all();
            $latests = Medicine::orderBy('id','desc')->limit(2)->get();
            return view('pharmacy.medicine.all_medicines', [
                'medicines' => $medicines,
                'latests' => $latests,
            ]); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Medicine $user)
    {   
        if(Gate::allows('isPharma') ? Response::allow() :abort(403)){
            $this->authorize('create',$user);
            return view('pharmacy.medicine.add_medicine');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddMedicineRequest $request, Medicine $user)
    {
        // $this->authorize('create',$user);

        // $request->validated();
        $request->validate([
            'generic_name' => 'required',
            // 'user_id' => 'required',
            'instructions' => 'required',
            'manufacture' => 'required',
            'description' => 'required',
            'starting_date' => 'required|date',
            'expiry_date' => 'required|date',
            'price' => 'required|integer',
            'available' => 'required|integer',
            'dose' => 'required|integer',
            'dose_unit' => 'required|integer',
            'image' => 'required|mimes:jpg,png,jpeg',
            'drug_dosage' => 'required',
            'drug_dosage_unit' => 'required',
        ]);
        // Image
        $image = time(). '-'. $request->input('image').  
        $request->image->extension();
       $request->image->move(public_path('images'), $image);

        // $price = $request->input('price');
        // $avai = $request->input('available');

        $medicine = Medicine::create([
            'generic_name' => $request->input('generic_name'),
            'user_id' => auth()->user()->id,
            'instructions' => $request->input('instructions'),
            'manufacture' => $request->input('manufacture'),
            'description' => $request->input('description'),
            'starting_date' => $request->input('starting_date'),
            'expiry_date' => $request->input('expiry_date'),
            'price' => $request->input('price'),
            'available' => $request->input('available'),
            'dose' => $request->input('dose'),
            'dose_unit' => $request->input('dose_unit'),
            'image' => $image,
            'drug_dosage' => $request->input('drug_dosage'),
            'drug_dosage_unit' => $request->input('drug_dosage_unit'),
        ]);

        // dd($medicine);
        return redirect('/medicines')->with('success','Drug has successfully been added to the stock');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        // if(Gate::allows('isAdmin') || Gate::allows('isPharma') ?Response::allow() :abort(403)){
            // $this->authorize('show',$medicine);
           
            return view('pharmacy.medicine.show_drug',[
                'medicine' => $medicine,
               
            ]);
        // }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        $this->authorize('restore',$medicine);
        return view('pharmacy.medicine.edit_drug')->with('medicine',$medicine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        //  $image = $request->file('image');
        if(!$request->has('image')){
            return response()->json(['messaage' => 'Missing file'],422);
        }
        $image = time(). '-'. $request->input('image').  
        $request->image->extension();
        $request->image->move(public_path('images'), $image);
        
        // dd($image);

        $medicine = Medicine::where('id', $user)
            ->update([
            'generic_name' => $request->input('generic_name'),
            'user_id' => auth()->user()->id,
            'instructions' => $request->input('instructions'),
            'manufacture' => $request->input('manufacture'),
            'description' => $request->input('description'),
            'starting_date' => $request->input('starting_date'),
            'expiry_date' => $request->input('expiry_date'),
            'price' => $request->input('price'),
            'available' => $request->input('available'),
            'dose' => $request->input('dose'),
            'dose_unit' => $request->input('dose_unit'),
            'image' => $image,
            'drug_dosage' => $request->input('drug_dosage'),
            'drug_dosage_unit' => $request->input('drug_dosage_unit'),
        ]);

        // dd($medicine);

        return redirect('/medicines')->with('success', 'Drug has been updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect('/medicines')->with('info', 'Drug has been deleted from the system');
    }
}
