<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidosClientesController extends Controller
{
    public function index(){
        return view('pedidos.index');
    }
}
