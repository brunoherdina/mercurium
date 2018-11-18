<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipament;

class OperacionalController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $equipaments = Equipament::all();
        return view('Operacional.home', compact('user'), compact('equipaments'));
    }
}
