<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\wineType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index()
    {   
        return view('home');
    }
}
