<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
// use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\DB;


class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $cart)
    {
        // $this->authorize('view',$cart);
        if(Gate::any(['isUser']) ? Response::allow() :abort(403)){
            $carts = Cart::all();
            $total_carts = Cart::all()->count();
            $medicines = Medicine::all();
            $latests = Medicine::orderBy('id','desc')->limit(4)->get();
            // dd($new_medicines);
            
            // Total amount of the all the items
            $amount_to_pay = auth()->user()->carts()->sum('total_amount');


            return view('order.cart', [
                'carts' => $carts,
                'amount_to_pay' => $amount_to_pay,
                'total_carts' => $total_carts,
                'medicines' => $medicines,
                'latests' => $latests,
            ]);
        }
        // throw new Exception('My first Sentry error!');
        // return redirect('/')->with('warning','Item open successfully!');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {
        // $request->validate([
        //     'medicine_id' => 'required|unique:carts'
        // ]);
    
        
        $medicine_id = $request->input('medicine_id');
        $user_id = auth()->user()->id;
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $amount = $quantity * $price;
        
        $medicine = Cart::where('medicine_id', '=',$medicine_id)->first();
        if($medicine === null){
            $cart = Cart::firstOrCreate([
            'medicine_id' => $medicine_id,
            'user_id' => $user_id,
            'price' => $price,
            'total_amount' => $amount ,
            'quantity' => $quantity,
            'medicine_name' => $request->input('medicine_name'),
        ]);
        return back()->with('success', 'medicine has been added to the cart');
        }else{
            return back()->with('warning', 'medicine is already in the cart');
        }
        
        
        
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $cart = Cart::find()
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

        
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
        // Getting the quantity of the medicine in the database
        $medicine_id = $request->input('medicine_id');
        $available_stock = Medicine::where('id', '=', $medicine_id)->pluck('available')->first();

        // Calculating for the total amount of the Medicines in the cart
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $amount = $quantity * $price;
        
        if($quantity < $available_stock){
            $cart = Cart::where('id',$id)
                ->update([
                    'quantity' => $quantity,
                    'total_amount' => $amount,
                ]);
            return redirect('/carts')->with('success', 'Quantiy updated success!');
        }else{
            return redirect()->back()->with('info', 'Sorry! there is only '.$available_stock . ' in the shop now');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect('/carts')
            ->with('success', 'cart has been deleted successfully');
    }
}
