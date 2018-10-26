<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChecklistQuestion;
use App\Models\EquipamentChecklist;
use App\Models\EquipamentType;
use DB;

class EquipamentChecklistController extends Controller
{
    public function novo()
    {
        $tipos = EquipamentType::get();
        return view('Checklists.cadastrar', compact('tipos'));
    }

    public function store(Request $request)
    {    
        try{   
        $eq = new EquipamentChecklist();
        $eq->version = $request->version;
        $eq->equipament_type_id = $request->type;
        $eq->save();
        }catch(\PDOException $e){
            echo "Erro: ".$e->getMessage();
        }

        $id= EquipamentChecklist::where('version', $eq->version)->get();
        $id = $id->id;
        $questions = $request->questions;
        $eq->storeQuestions($id, $questions);
    }

    private function storeQuestions($id, $questions)
    {
        foreach($questions as $question)
        {
            $cq = new ChecklistQuestion();
            $cq->name = $question->name;
            $cq->equipament_checklist_id = $id;
        }
    }
}

