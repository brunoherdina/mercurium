<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\EmployeePosition;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try{
        $password = str_shuffle(time().rand(0, 10));
        $u = new User();
        $u->name = $request->input('name');
        $u->email = $request->input('email');
        $u->matricula = $request->input('matricula');
        $u->password = $password;
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
        $u = User::findOrFail($id);
        $u->delete();
    }
}
