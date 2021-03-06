<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\EmployeePosition;
use App\Models\EquipamentType;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Checklist;
use App\Models\ChecklistAnswer;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try{
        $u = new User();
        $u->name = $request->input('name');
        $u->email = $request->input('email');
        $u->matricula = $request->input('matricula');
        $u->password = password_hash($request->email, PASSWORD_DEFAULT);
        $u->employee_position_id = $request->input('employee_position_id');
        $u->image = $request->input('image');
        $u->equipament_type_id = $request->input('categoria');
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
            $u->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
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
        $checklists = Checklist::where('user_id', $u->id)->get();
        
            foreach($checklists as $c){
                $answers = ChecklistAnswer::where('checklist_id', $c->id)->get();
                    foreach($answers as $a){
                        $a->delete();
                    }
                $c->delete();
            }

        $u->delete();
        return redirect()->route('user.search')->with('success', 'Usuário excluido com sucesso!');
        }catch(PDOException $e){
            return redirect()->route('user.search')->with('error', 'Erro ao excluir: '.$e->getMessage());
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

    public function login (Request $request)
    {
        $email = $request->email;
        $senha = $request->password;

        $user = DB::table('users')->where('email', $email)->first();
        $hash = $user->password;

        if(password_verify($senha, $hash))
        {
            if($user->employee_position_id == 1){
                return redirect()->route('home', compact('user')); 
            }else{
                return redirect()->route('funcionarios', compact('user'));
            }

        }else{
           return redirect()->route('login')->with('error', 'Usuário ou senha inválido!');
        }
    }

    public function getAll()
    {
        $niveis = EmployeePosition::get();
        $categorias = EquipamentType::get();
       return view('Usuarios.adicionar', compact('niveis'), compact('categorias'));
    }

    public function showProfile(){
        $user = Auth::user();
        return view('Usuarios.perfil', [
            'user' => $user,
        ]);
    }

    public function alterarSenha(Request $request)
    {
        $user = Auth::user();
        
        $senha = $request->input('senhaAtual');
        $novaSenha1 = $request->input('novaSenha1');
        $novaSenha2 = $request->input('novaSenha2');
        $hash = $user->password;

        if(password_verify($senha, $hash))
        {
            if($novaSenha1 == $novaSenha2){
                try{
                    $user->password = password_hash($novaSenha1, PASSWORD_DEFAULT);
                    $user->save();
                    return redirect()->route('user.profile')->with('success', 'Senha alterada com sucesso!');
                }catch(PDOException $e){
                    return redirect()->route('user.profile')->with('error', 'Falha ao alterar senha'. $e->getMessage());
                }
            }
        }else{
            return redirect()->route('user.profile')->with('error', 'A senha digitada não condiz com nossos registros!');
        }
    }
}
