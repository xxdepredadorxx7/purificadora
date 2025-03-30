<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosClientesController extends Controller
{
    public function index(){
        return view('productos.index');
    }
}
