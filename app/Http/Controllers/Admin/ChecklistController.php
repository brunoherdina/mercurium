<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\EquipamentChecklist;
use App\Models\Checklist;
use App\User;
use App\Models\ChecklistQuestion;
use App\Models\ChecklistAnswer;

class ChecklistController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('busca'))
        {

            $s = $request->get('busca');
            $checklists = DB::table('checklists')
            ->join('users', 'checklists.user_id', '=', 'users.id')
            ->join('equipaments', 'checklists.equipament_id', '=', 'equipaments.id')
            ->join('equipament_checklists', 'checklists.equipament_checklist_id', '=', 'equipament_checklists.id')
            ->select('users.name AS uName', 'equipaments.name', 'checklists.created_at AS data', 'checklists.id')
            ->where(function($q) use ($s){
                $q->Where('users.name', 'LIKE', "%{$s}%");
                $q->orWhere('equipaments.name', 'LIKE', "%{$s}%");
            })
            ->orderBy('data', 'desc')
            ->paginate(15);
            return view('Checklists.preenchidos', compact('checklists'));

            }else{
                $checklists = DB::table('checklists')
                ->join('users', 'checklists.user_id', '=', 'users.id')
                ->join('equipaments', 'checklists.equipament_id', '=', 'equipaments.id')
                ->join('equipament_checklists', 'checklists.equipament_checklist_id', '=', 'equipament_checklists.id')
                ->select('users.name AS uName', 'equipaments.name', 'checklists.created_at AS data', 'checklists.id')
                ->orderBy('data', 'desc')
                ->get();
        
                return view('Checklists.preenchidos', compact('checklists'));
            }
    }

    public function showChecklist($id)
    {
        $user = DB::table('checklists')
        ->where('checklists.id', $id)
        ->join('users', 'checklists.user_id', '=', 'users.id')
        ->select('users.*')
        ->first();

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

        return view('Checklists.exibirPreenchido', [
            'user' => $user,
            'checklist' => $checklist,
            'questions' => $questions,
            'answer' => $answer,
        ]);
    }
}
