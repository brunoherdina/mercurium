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
        }catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }       

        $questions = array_filter($request->questions);
        $this->storeQuestions($questions);
    }

    private function storeQuestions($questions)
    {
        $checklist = DB::table('equipament_checklists')->latest('id')->first();
        $id = $checklist->id;
        foreach($questions as $question)
        {
            try{
            $cq = new ChecklistQuestion();
            $cq->name = $question;
            $cq->equipament_checklist_id = $id;
            $cq->save();
            }catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }
    }
}

