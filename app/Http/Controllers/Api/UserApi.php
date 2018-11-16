<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

class UserApi extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $senha = $request->password;

        $user = DB::table('users')->where('email', $email)->first();
        $hash = $user->password;

        $data;
        if(password_verify($senha, $hash))
        {
            $data = Array(
                "permissao" =>true,
                "nome"  =>$user->name,
                "email" =>$user->email
            );
            return json_encode($data);
        }else{
            $data = Array(
                "permissao" =>false,
                "erro"  => "Email ou senha incorretos!"
            );
            return json_encode($data);
        }
    }
}
