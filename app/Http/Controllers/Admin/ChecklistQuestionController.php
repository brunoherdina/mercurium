<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChecklistQuestion;

class ChecklistQuestionController extends Controller
{
    public function store(Request $request)
    {
        $questions = array_filter($request->questions);

        try
        {

            foreach($questions as $q)
            {
                $checklistQuestion = new ChecklistQuestion();
                $checklistQuestion->name = $q;
                $checklistQuestion->save();
            }

            return redirect()->route('question.add')->with('success', 'Perguntas adicionadas com sucesso!');

        }catch(PDOException $e)
        {
            return redirect()->route('question.add')->with('error', 'Erro ao adicionar pergunta(s): '.$e->getMessage());
        }
    }


}
