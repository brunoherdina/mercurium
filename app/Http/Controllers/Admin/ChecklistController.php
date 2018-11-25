<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ChecklistController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('busca'))
        {

            $s = $request->get('busca');
            $checklists = DB::table('checklists')
            ->join('users', 'checklists.user_id', '=', 'users.id')
            ->join('equipament_types', 'checklists.equipament_id', '=', 'equipament.id')
            ->select('equipament_checklists.*', 'equipament_types.type')
            ->where(function($q) use ($s){
                $q->Where('version', 'LIKE', "%{$s}%");
                $q->orWhere('type', 'LIKE', "%{$s}%");
            })->paginate(15);
            return view('Checklists.listar', compact('checklists'));

            }else{
                $checklists = DB::table('equipament_checklists')
                ->join('equipament_types', 'equipament_checklists.equipament_type_id', '=', 'equipament_types.id')
                ->select('equipament_checklists.*', 'equipament_types.type')
                ->get();
        
                return view('Checklists.listar', compact('checklists'));
            }
    }
}
