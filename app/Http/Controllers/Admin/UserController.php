<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\EmployeePosition;
use DB;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try{
        $u = new User();
        $u->name = $request->input('name');
        $u->email = $request->input('email');
        $u->matricula = $request->input('matricula');
        $u->password = bcrypt($request->email);
        $u->employee_position_id = $request->input('employee_position_id');
        $u->image = $request->input('image');
        $u->save();
        return redirect()->route('user.add')->with('success', 'Usuário cadastrado com sucesso!');
        }catch(PDOException $e)
        {
            return redirect()->route('user.add')->with('error', 'Erro ao cadastrar usuário! '.$e->getMessage());
        }
    }

    public function show($id)
    {
        $u = User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        try
        {
            $u = User::findOrFail($id);

            $u->name = $request->input('name');
            $u->email = $request->input('email');
            $u->password = $request->input('password');
            $u->login = $request->login('login');
            $u->employee_position_id = $request->input('employee_position_id');
            $u->image = $request->input('image');
            $u->save();
        }catch(PDOExcption $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try{
        $u = User::findOrFail($id);
        $u->delete();
        return redirect()->route('user.search')->with('success', 'Usuário excluido com sucesso!');
        }catch(PDOException $e){
            return redirect()->route('user.search')->with('erro', 'Erro ao excluir: '.$e->getMessage());
        }
    }

    public function search(Request $request)
    {
        if($request->has('busca')){
        $s = $request->get('busca');
        $resultados = DB::table('users')
        ->join('employee_positions', 'users.employee_position_id', '=', 'employee_positions.id')
        ->select('users.*', 'employee_positions.type')
        ->where(function($q) use ($s){
            $q->Where('name', 'LIKE', "%{$s}%");
            $q->orWhere('matricula', 'LIKE', "%{$s}%");
            $q->orWhere('email', 'LIKE', "%{$s}%");
            $q->orWhere('type', 'LIKE', "%{$s}%");
        })->paginate(15);
        return view('Usuarios.buscar', compact('resultados'));
        }else{
            $resultados = DB::table('users')
            ->join('employee_positions', 'users.employee_position_id', '=', 'employee_positions.id')
            ->select('users.*', 'employee_positions.type')
            ->get();
        return view('Usuarios.buscar', compact('resultados'));
        }
    }
}
