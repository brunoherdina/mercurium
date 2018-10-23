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
        $tipos = EquipamentType::get();
        return view('Checklists.adicionar', compact('tipos'));

        $eChecklist = new EquipamentChecklist();
    }

    public function store(Request $request)
    {
        //Pega perguntas do request
        $questions = $request->questions;

        //Pega categoria do equipamento
        $categoria = $request->categoria;

        //Verifica se já existe algum checklist cadastrado para essa categoria
        $c = ChecklistQuestion::where('equipament_type_id', $categoria);
        if($c->count() > 0){
            return redirect()->route('checklist.add')->with('error', 'Já existe um checklist cadastrado para essa categoria de equipamento.<br/>
            Para cadastrar um novo checklist para essa categoria apague o anterior na seção <a href="{{ route(\'checklist.delete\')}}"><strong>Excluir</strong></a> da aba Checklists');
        }

        //Filtra resultados no array das perguntas
        $questions = array_filter($questions);
        
        //Adiciona as perguntas ao BD
        try{
            foreach($questions as $q)
            {
                $cq = new ChecklistQuestion();
                $cq->name = $q;
                $cq->equipament_type_id = $categoria;
                $cq->save(); 
            }
        }catch(PDOException $e){
            return redirect()->route('checklist.add')->with('error', 'Erro ao adicioar checklist: '.$e->getMessage());
        }
            return redirect()->route('checklist.add')->with('success', 'Checklist adicionado com sucesso!');
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
