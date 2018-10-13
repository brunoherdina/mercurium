<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EquipamentType;

class EquipamentTypeController extends Controller
{

    public function index()
    {
        $tipos = EquipamentType::orderBy('id', 'asc')->get();    
        return view('Equipamentos.categorias', compact('tipos'));        
    }

    public function getAll()
    {
        $tipos = EquipamentType::get();
       return view('Equipamentos.adicionarEquipamento', compact('tipos'));
    }

    public function store(Request $request)
    {
        try{
        $t = new EquipamentType();
        $t->type = $request->type;
        $t->save();
        return redirect()->route('equipamentTypes')->with('success', 'Novo tipo adicionado!');
        }catch(PDOException $e){
            return redirect()->route('equipamentTypes')->with('error', 'Falha ao adicionar: '.$e-getMessage());
        }
    }

    public function destroy($id)
    {
        $t = EquipamentType::findOrFail($id);
        $t->delete();
        return redirect()->route('equipamentTypes')->with('error', 'Tipo excluido com sucesso!');
    }

    public function editarTipo($id)
    {
        $e = new Equipament();
        $e = $e->find($id);
        return view('Equipamentos.categoriaEdit', compact('e'));
    }
}
