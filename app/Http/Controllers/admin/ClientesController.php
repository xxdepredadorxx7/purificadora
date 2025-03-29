<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(){
        $clientes = User::where('role', 'cliente')->get();
        return view('admin.clientes.index', compact('clientes'));
    }
}
