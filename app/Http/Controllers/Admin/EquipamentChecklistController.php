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
        $eq->version = $request->input('version');
        $eq->equipament_type_id = $request->input('type');
        $eq->save();
        }catch(\PDOException $e){
            echo "Erro: ".$e->getMessage();
        }

        $eq2 = EquipamentChecklist::orderBY('id', 'desc')->take(1)->get();
        $id = $eq2->id;
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

