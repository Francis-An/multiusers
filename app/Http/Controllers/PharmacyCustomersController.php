<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderMedicine;
use Illuminate\Support\Facades\Auth;

class PharmacyCustomersController extends Controller
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
        // pluck('areas')->flatten()->toArray();
        
        $orders = (Auth::user()->order)->unique('user_id')->all();
        $orderM = OrderMedicine::select('user_id')->groupBy('user_id')->get();
        $sum = '';

        $collection = collect([1,1,1,2,1,1,3,2,3,5,23,]);
        // $orders = $collection->unique()->all();

            // $projects = $county->projects()
            // ->published()
            // ->with(['areas:id,area_name', 'school:id,display_name'])
            // ->orderBy('projects.project_name', 'asc')
            // ->get();

        // foreach($orders as $order){
        //         $sum += $order->users['name'];
        //     }
            // dd($orders);
            return view('user.customers_for_one_pharmacy', [
                // $pharmacy
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
