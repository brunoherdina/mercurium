<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChecklistQuestion;
use App\Models\EquipamentChecklist;
use App\Models\EquipamentType;

class EquipamentChecklistController extends Controller
{
    public function adicionar()
    {
        $tipos = EquipamentType::get();
        return view('Checklists.adicionar', compact('tipos'));
    }

    public function store(Request $request)
    {
        
    }
}
