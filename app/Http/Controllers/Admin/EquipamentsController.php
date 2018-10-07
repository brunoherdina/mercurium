<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipament;
use App\Models\EquipamentType;

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
       $equipamentos = Equipament::get();
       return view('Equipamentos.alterarEquipamento', compact('equipamentos'));
    }

    public function store(Request $request)
    {
        try{
        $eq = new Equipament();
        $eq->name = $request->input('name');
        $eq->status = $request->input('status');
        $eq->equipament_type_id = $request->input('equipament_type_id');
        $eq->save();
        return redirect()->route('equipament.store')->with('success');
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $e = Equipament::find($id);

    }

    public function update(Request $request, $id)
    {

        $eq = Equipament::findOrFail($id);

        $eq->name = $request->input('name');
        $eq->status = $request->input('status');
        $eq->equipament_type_id = $request->input('equipament_type_id');
        $eq->save();
        return redirect()->route('equipament.store')->with('message', 'Equipamento alterado com sucesso!');
    }

    public function destroy(Request $request, $id)
    {

        $eq = Equipament::find($id);
        $eq->delete();

        return redirect()->route('user.index')->with('message', 'Equipamento excluido com sucesso!');
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
