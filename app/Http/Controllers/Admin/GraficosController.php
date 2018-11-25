<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Equipament;
use App\Http\Controllers\Controller;
use DB;
class GraficosController extends Controller
{
    public function index()
    {

        $result = DB::table('equipaments')
        ->select('equipaments.status')
        ->get();

        return response()->json($result);

    }

    public function checklistsPreenchidos()
    {
        $result = DB::table('checklists')
        ->select('checklists.id')
        ->get();

        return response()->json($result);

    }
}
