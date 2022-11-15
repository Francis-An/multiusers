<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Medicine;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        if (Gate::allows('isAdmin')) {
            $total_users = User::where('role','=','user')->count();
            $total_pharmacies = User::where('role','=','pharma')->count();
            $total_drugs = Medicine::all()->count();

            return view('admin.admin_dash',[
                'total_users' => $total_users,
                'total_pharmacies' => $total_pharmacies,
                'total_drugs' => $total_drugs,
            ]);
        }
        else {
            $medicines = Medicine::all();
            $latests = Medicine::orderBy('id','desc')->limit(4)->get();
            return view('dashboard',[
                'medicines' => $medicines,
                'latests' => $latests,
    
            ]);
        }



    }
}


