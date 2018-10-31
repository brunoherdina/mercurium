<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipament;
use App\Models\EquipamentType;
use DB;

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
        $equipamentos = DB::table('equipaments')
        ->join('equipament_types', 'equipaments.equipament_type_id', '=', 'equipament_types.id')
        ->select('equipaments.*', 'equipament_types.type')
        ->get();
       return view('Equipamentos.alterarEquipamento', compact('equipamentos'));
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

        $eq = Equipament::find($id);
        $eq->delete();

        return redirect()->route('equipament.list')->with('success', 'Equipamento excluido com sucesso!');
    }

    public function editarEquipamento($id)
    {
        $e = new Equipament();
        $e = $e->find($id);
        $tipos = new EquipamentType();
        $tipos = $tipos->get();
        return view('Equipamentos.editar', compact('e'), compact('tipos'));

    }

}
