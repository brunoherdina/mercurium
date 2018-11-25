<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipament;
use App\Models\EquipamentType;
use DB;
use App\Models\EquipamentChecklist;
use App\Models\Checklist;
use App\Models\ChecklistAnswer;

class EquipamentsController extends Controller
{
    public function index(Request $request)
    {
        if ($request == null) {
            return Equipament::orderBy('id', 'asc')->get('name');
        } else {
            return $this->show($id);
        }
    }

    public function getAll(Request $request)
    {

        if($request->has('busca')){
            $s = $request->get('busca');
            $equipamentos = DB::table('equipaments')
            ->join('equipament_types', 'equipaments.equipament_type_id', '=', 'equipament_types.id')
            ->select('equipaments.*', 'equipament_types.type')
            ->where(function($q) use ($s){
                $q->Where('name', 'LIKE', "%{$s}%");
                $q->orWhere('type', 'LIKE', "%{$s}%");
            })->paginate(15);
            return view('Equipamentos.alterarEquipamento', compact('equipamentos'));
            }else{
                $equipamentos = DB::table('equipaments')
                ->join('equipament_types', 'equipaments.equipament_type_id', '=', 'equipament_types.id')
                ->select('equipaments.*', 'equipament_types.type')
                ->get();
            return view('Equipamentos.alterarEquipamento', compact('equipamentos'));
            }

        
    }

    public function store(Request $request)
    {
        try{
        $eq = new Equipament();
        $eq->name = $request->input('name');
        $eq->km = $request->input('km');
        $eq->status = 1;
        $eq->equipament_type_id = $request->input('equipament_type_id');
        $eq->save();
        return redirect()->route('equipament.store')->with('success', 'Equipamento adicionado com sucesso!');
        }catch(PDOException $e){
            return redirect()->route('equipament.store')->with('error', 'Erro ao adicionar equipamento!');
        }
    }

    public function show($id)
    {
        $e = Equipament::find($id);

    }

    public function update(Request $request, $id)
    {
        try{
        $eq = Equipament::findOrFail($id);

        $eq->name = $request->input('name');
        $eq->equipament_type_id = $request->input('equipament_type_id');
        $eq->save();
        return redirect()->route('equipament.list')->with('success', 'Equipamento alterado com sucesso!');
        }catch(PDOException $e){
            return redirect()->route('equipament.list')->with('error', 'Erro ao alterar equipamento!');
        }
    }

    public function destroy($id)
    {
        try{
            $eq = Equipament::find($id);
            $checklists = Checklist::where('equipament_id', $id)->get();
            foreach($checklists as $c)
            {
                    $answers = ChecklistAnswer::where('checklist_id', $c->id)->get();
                    foreach($answers as $a){
                        
                        $a->delete();
                    }

                    $c->delete();
            }
            $eq->delete();

            return redirect()->route('equipament.list')->with('success', 'Equipamento excluido com sucesso!');
        }catch(PDOException $e){
            return redirect()->route('equipament.list')->with('error', 'Erro ao excluir equipamento: '.$e->getMessage());
        }
    }

    public function editarEquipamento($id)
    {
        $e = new Equipament();
        $e = $e->find($id);
        $tipos = new EquipamentType();
        $tipos = $tipos->get();
        return view('Equipamentos.editar', compact('e'), compact('tipos'));

    }

    public function corrigir($id)
    {
        $e = Equipament::findOrFail($id);
        try{
            $e->status = 1;
            $e->save();
            return redirect()->route('equipament.list')->with('success', 'Equipamento removido da lista de equipamentos defeituosos');
        }catch(PDOException $e){
            return redirect()->route('equipament.list')->with('error', 'Falha ao remover equipamento da lista de equipamentos defeituosos!'. $e->getMessage());
        }
    }
}
