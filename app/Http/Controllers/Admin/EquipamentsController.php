<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipament;

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
        return view('Equipamentos.adicionarEquipamento')->with('success', 'Equipamento cadastrado com sucesso.');
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        return Equipament::find($id);
    }

    public function update(Request $request, $id)
    {

        $eq = Equipament::findOrFail($id);

        $eq = new Equipament();
        $eq->name = $request->input('name');
        $eq->status = $request->input('status');
        $eq->equipament_type_id = $request->input('equipament_type_id');
        $eq->save();
        return redirect()->route('user.index')->with('message', 'Equipamento alterado com sucesso!');
    }

    public function destroy(Request $request, $id)
    {

        $eq = Equipament::find($id);
        $eq->delete();

        return redirect()->route('user.index')->with('message', 'Equipamento excluido com sucesso!');
    }
}
