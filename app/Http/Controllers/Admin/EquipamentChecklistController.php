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
    public function adicionar()
    {
        $questions = ChecklistQuestion::get();
        $tipos = EquipamentType::get();
        return view('Checklists.adicionarVersao', compact('tipos'), compact('questions'));

        $eChecklist = new EquipamentChecklist();
    }

    public function store(Request $request)
    {
        //Pega perguntas do request
        $questions = $request->questions;

        //Pega categoria do equipamento
        $categoria = $request->categoria;

        //Filtra resultados no array das perguntas
        $questions = array_filter($questions);
        
        $eChecklist = new EquipamentChecklist();
        $eChecklist->equipament_type_id = $categoria;
        $eChecklist->version = $request->version;
        foreach($questions as $q)
        {
            $eChecklist->question = $q->id;
        }
    }

    public function alterar()
    {
        $tipos = EquipamentType::get();
        $cq = ChecklistQuestion::get();
        foreach($cq as $q)
        {
            
        } 


        return view('Checklists.alterar', compact ('tipos'));
    }

    // if($request->has('busca')){
    //     $s = $request->get('busca');
    //     $resultados = DB::table('checklist_questions')
    //     ->join('equipament_types', 'checklist_questions.equipament_type_id', '=', 'equipament_types.id')
    //     ->select('equipament_types.type', 'equipament_types.id')
    //     ->where(function($q) use ($s){
    //         $q->Where('type', 'LIKE', "%{$s}%");
    //     })->paginate(15);
    //     return view('Checklists.excluir', compact('resultados'));
    //     }else{
    //         $resultados = DB::table('checklist_questions')
    //         ->join('equipament_types', 'checklist_questions.equipament_type_id', '=', 'equipament_types.id')
    //         ->select('equipament_types.type', 'equipament_types.id')
    //         ->get();
    //         return view('Checklists.excluir', compact('resultados'));
    //     }

}
