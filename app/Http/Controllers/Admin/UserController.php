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
        
        $u = new User();
        $u->name = $request->input('name');
        $u->email = $request->input('email');
        $u->matricula = $request->input('matricula');
        $u->password = $request->input('password');
        $u->employee_position_id = $request->input('employee_position_id');
        $u->image = $request->input('image');
        $u->save();
        
        }catch(PDOException $e)
        {
            return $e->getMessage();
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

    public function gerarSenha(){
        $numero_de_bytes = 8;

        $resultado_bytes = random_bytes($numero_de_bytes);
        $resultado_final = bin2hex($resultado_bytes);
        return $resultado_final;
      }
}
