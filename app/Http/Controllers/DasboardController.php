<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class DasboardController extends Controller
{
    public function index() {
        $medicines = Medicine::all();
        $latests = Medicine::orderBy('id','desc')->limit(4)->get();
        return view('dashboard',[
            'medicines' => $medicines,
            'latest' => $latests,

        ]);
    }
}
