<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EquipamentType;

class EquipamentTypeController extends Controller
{

    public function index($id)
    {
        if ($id == null) {
            return EquipamentType::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    public function getAll()
    {
        $tipos = EquipamentType::get();
       return view('Equipamentos.adicionarEquipamento', compact('tipos'));
    }
}
