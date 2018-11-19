<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipament;
use App\Models\EquipamentChecklist;
use App\Models\ChecklistQuestion;
use App\Models\Checklist;
use App\Models\ChecklistAnswer;
use DB;

class OperacionalController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $eq_id = $user->equipament_type_id;

        $equipaments = Equipament::where('equipament_type_id', $eq_id)->get();
        $checklist = EquipamentChecklist::where('equipament_type_id', $eq_id)->where('in_use', 1)->first();

        $perguntas = ChecklistQuestion::where('equipament_checklist_id', $checklist->id)->get();

        $meusChecklists = DB::table('checklists')
        ->where('user_id', '=', $user->id)
        ->join('equipament_checklists', 'checklists.equipament_checklist_id', '=', 'equipament_checklist.id')
        
        ->select('equipament_checklists.*', 'equipament_types.type')
        ->get();
        
        return view('Operacional.home', [
            'user' => $user,
            'equipaments' => $equipaments,
            'perguntas' => $perguntas,
            'checklist' => $checklist,
            'meusChecklists' => $meusChecklists
        ]);
    }

    public function storeChecklist(Request $request)
    {
        //Recuperando id do usuário
        $user = Auth::user();
        //Salva id do equipamento
        $eq_id = $request->input('frota');
        
         //Buscando equipamento
         $equipament = Equipament::findOrFail($eq_id);

        //Preenchendo dados do checklist
        try{
        $checklist = new Checklist();
        $checklist->user_id = $user->id;
        $checklist->equipament_checklist_id = $request->input('checklist_id');
        $checklist->equipament_type_id = $request->input('frota');
        $checklist->hInicial = $equipament->km;
        $checklist->hFinal = $request->input('hFinal');
        $checklist->parecer_final = $request->input('parecerFinal');
        $checklist->observacoes = $request->input('observacao');
        $checklist->save();
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        try{
            //Alterando horimetro do equipamento
            $equipament->km = $request->input('hFinal');
            $equipament->save();
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        //Adicionando respostas
        $answers = $request->input('answers');
        $questions = $request->input('questions');
        $this->storeAnswers($answers, $questions);
        return redirect()->route('operacional')->with('success', 'Checklist cadastrado com sucesso!');


        
    }

    private function storeAnswers($answers, $questions)
    {
        $c = DB::table('checklists')->latest('id')->first();
        $id = $c->id;
        foreach($answers as $a)
        {
            foreach($questions as $q)
            {
                $answer = new ChecklistAnswer();
                $answer->value = $a;
                $answer->checklist_id = $id;
                $answer->checklist_question_id = $q;
                $answer->save();
            }
        }
    }
}
