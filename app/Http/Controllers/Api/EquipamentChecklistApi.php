<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Checklist as ChecklistResource;
use App\Http\Requests;
Use App\Models\EquipamentChecklist;

class EquipamentChecklistApi extends Controller
{
    public function index()
    {
        //Remover o 'data'
        ChecklistResource::withoutWrapping();

        //Recebe todos os checklists
        $eq = EquipamentChecklist::all();

        //Retorna o JSON
        return ChecklistResource::collection($eq);
    }
}
