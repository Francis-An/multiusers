<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
// use App\Http\Controllers\MedicinesController;

class WelcomeController extends Controller
{
    
    public function index () {
        $medicines = Medicine::orderBy('id','desc')->limit(4)->get();
        // $medicines = Medicine::all();
        
        return view('welcome')->with('medicines',$medicines);
    }


    public function guest() {
        
    //    if (! Gate::any(['isAdmin','isUser','isPharma']) ? Response::allow() :abort(403)){
         $medicines = Medicine::all();
        $latests = Medicine::orderBy('id','desc')->limit(4)->get();
        return view('dashboard',[
            'medicines' => $medicines,
            'latests' => $latests,

        ]);
    //    }
    }
}
 