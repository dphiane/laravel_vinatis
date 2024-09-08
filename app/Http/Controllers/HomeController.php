<?php

namespace App\Http\Controllers;

use App\Models\wine;

class HomeController extends Controller
{
    //
    function index()
    {   
        $wines = Wine::all();
        return view('home',compact('wines'));
    }
}
