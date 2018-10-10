<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeePosition;
class EmployeePositionController extends Controller
{
    public function getAll()
    {
        $niveis = EmployeePosition::get();
       return view('Usuarios.adicionar', compact('niveis'));
    }
}
