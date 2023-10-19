<?php

namespace App\Http\Controllers\gis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GISController extends Controller
{
    public function index(){
        return view('map');
    }
}
