<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderMedicine;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;

class OrderMedicinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Gate::any(['isPharma','isUser']) ? Response::allow() :abort(403)){
            $orders = OrderMedicine::all();
            return view('order.orders', [
            'orders' => $orders
        ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $userid = $user->id;
        $items = Cart::where('user_id','=', $userid)->get();

        foreach ($items as $item){
            $order = OrderMedicine::create([
                'user_id' => $item->user_id,
                'medicine_id' => $item->medicine_id,
                'amount' => $item->total_amount, 
                'quantity' => $item->quantity, 
                'date' => $item->created_at, 
                // 'quantity' => $item->quantity, 
            ]);

            $cart_id = $item->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
            // dd($order);
        }

        

        return redirect()->back()->with('success', 'Order has successfully made');
        // dd($data);

        // $order = OrderMedicine::create([
        //     'user_id' => auth()->user()->id,
        //     'medicine_id' => $request->input('medicine_id'),
        //     'amount' => $request->input('amount'),
        //     // 'location' => $request->input('location'),
        //     // 'phone' => $request->input('phone'),
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicine = OrderMedicine::find($id);
        return view('order.orders',[
            'medicine' => $medicine,
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
    public function destroy(OrderMedicine $order)
    {   
        // echo "<script>confirm('Hello');</script>";

        // if(True) {
            
        //     echo "<script>alert('sucess');</script>";
        // }else{
            
        //     echo "<script>alert('sorry!');</script>";
        // }
        // if(True){
        // }else{
            
            $order->delete();
            return redirect()->back()->with('danger', 'Order has been cancelled!');
        // }
    }


    public function changeStatus($id) {
        $getStatus = OrderMedicine::select('status')->where('id',$id)->first();
        // return $getStatus;
        if($getStatus->status == 'pending'){
            $status = 'Ready';
        }
        elseif($getStatus->status == 'Ready'){
            $status = 'Delivered';
        }
        elseif($getStatus->status == 'Cancelled' || $getStatus->status == 'Delivered'){
            $status = 'Re-Order';
        }
        elseif($getStatus->status == 'Re-Order'){
            $status = 'pending';
        }
        elseif($getStatus->status == 'Delivered') {
            $status = 'Delivered';
        }
        orderMedicine::where('id',$id)->update(['status' => $status]);
        return redirect()->back()->with('success','change status successfull !');
    }

    public function cancelled($id) {
        $getStatus = OrderMedicine::select('status')->where('id',$id)->first();
        if($getStatus->status == 'pending' || $getStatus->status == 'Re-Order'){
            $status = 'Cancelled';
        }
        orderMedicine::where('id',$id)->update(['status' => $status]);
        return redirect()->back()->with('success','change status successfull !');
    }
}
