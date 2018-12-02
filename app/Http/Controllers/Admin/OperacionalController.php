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
use App\Models\EquipamentType;

class OperacionalController extends Controller
{

    public function myChecklists()
    {
        $user = Auth::user();
        $eq_id = $user->equipament_type_id;

        $equipaments = Equipament::where('equipament_type_id', $eq_id)->get();
        $checklist = EquipamentChecklist::where('equipament_type_id', $eq_id)->where('in_use', 1)->first();

        $perguntas = ChecklistQuestion::where('equipament_checklist_id', $checklist->id)->get();

        $meusChecklists = DB::table('checklists')
        ->where('user_id', '=', $user->id)
        ->join('equipament_checklists', 'checklists.equipament_checklist_id', '=', 'equipament_checklists.id')
        ->join('equipaments', 'checklists.equipament_id', '=', 'equipaments.id')
        ->select('checklists.*', 'equipament_checklists.version', 'equipaments.name')
        ->orderBy('checklists.created_at', 'DESC')
        ->get();
        
        return view('Operacional.meusChecklists', [
            'user' => $user,
            'equipaments' => $equipaments,
            'perguntas' => $perguntas,
            'checklist' => $checklist,
            'meusChecklists' => $meusChecklists
        ]);
    }

    public function newChecklist()
    {
        $user = Auth::user();
        $eq_id = $user->equipament_type_id;

        $equipaments = Equipament::where('equipament_type_id', $eq_id)->get();
        $checklist = EquipamentChecklist::where('equipament_type_id', $eq_id)->where('in_use', 1)->first();

        $perguntas = ChecklistQuestion::where('equipament_checklist_id', $checklist->id)->get();

        return view('Operacional.novo', [
            'user' => $user,
            'equipaments' => $equipaments,
            'perguntas' => $perguntas,
            'checklist' => $checklist,
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
        $checklist->equipament_id = $request->input('frota');
        $checklist->hInicial = $equipament->km;
        $checklist->hFinal = $request->input('hFinal');
        $checklist->parecer_final = $request->input('parecerFinal');
        $checklist->observacoes = $request->input('observacao');
        $checklist->save();
        
            if($checklist->parecer_final == 0){
                $equipament = Equipament::where('id', $checklist->equipament_id)->first();
                $equipament->status = 0;
                $equipament->save();
            }

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
        $answers = array_filter($request->input('answers'));
        $questions = array_filter($request->input('questions'));
        $this->storeAnswers($answers, $questions);
        return redirect()->route('operacional.myChecklists')->with('success', 'Checklist cadastrado com sucesso!');


        
    }

    private function storeAnswers($answers, $questions)
    {
        $c = DB::table('checklists')->latest('id')->first();
        $id = $c->id;
        $i = 0;
            foreach($answers as $a)

            {
                    $answer = new ChecklistAnswer();
                    $answer->value = $a;
                    $answer->checklist_id = $id;
                    $answer->checklist_question_id = $questions[$i];
                    $answer->save();
                    $i++;
                
            }
    }

    public function showChecklist($id)
    {
        $user = Auth::user();

        $checklist = DB::table('checklists')
        ->where('checklists.id', '=', $id)
        ->join('equipaments', 'checklists.equipament_id', '=', 'equipaments.id')
        ->select('checklists.*', 'equipaments.name')
        ->first();

        $checklistId = EquipamentChecklist::where('id', $checklist->equipament_checklist_id)->first();
        $questions = ChecklistQuestion::where('equipament_checklist_id', $checklistId->id)->get();
        $answers = ChecklistAnswer::where('checklist_id', $checklist->id)->get();
        $answer = array();
        foreach($answers as $a)
        {
            if($a->value == 1)
            {
                $answer[] = "Bom";
            }else if($a->value == 2)
            {
                $answer[] = "Regular";
            }else if($a->value == 3)
            {
                $answer[] = "Ruim";
            }else{
                $answer[]= "N/A";
            }
        }

        return view('Operacional.exibirChecklist', [
            'user' => $user,
            'checklist' => $checklist,
            'questions' => $questions,
            'answer' => $answer,
        ]);
    }

    public function showProfile()
    {
        $user = Auth::user();
        $equipament = EquipamentType::where('id', $user->equipament_type_id)->first();
        return view('Operacional.perfil', [
            'user' => $user,
            'equipament' => $equipament,
        ]);
    }

    public function alterarSenha(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $senha = $request->input('senhaAtual');
        $novaSenha1 = $request->input('novaSenha1');
        $novaSenha2 = $request->input('novaSenha2');
        $hash = $user->password;

        if(password_verify($senha, $hash))
        {
            if($novaSenha1 == $novaSenha2){
                try{
                    $user->password = password_hash($novaSenha1, PASSWORD_DEFAULT);
                    $user->save();
                    return redirect()->route('operacional.alterarSenha')->with('success', 'Senha alterada com sucesso!');
                }catch(PDOException $e){
                    return redirect()->route('operacional.alterarSenha')->with('error', 'Falha ao alterar: '.$e->getMessage());
                }
            }
            
        }else{
            return redirect()->route('operacional.alterarSenha')->with('error', 'A senha digitada não condiz com nossos registros!');
        }
    }

    public function logout()
    {
            Auth::logout();
            return redirect("/login");
        
    }
}
