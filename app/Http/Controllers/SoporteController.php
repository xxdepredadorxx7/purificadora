<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoporteController extends Controller
{
    public function index(){
        return view('soporte.index');
    }
}
