<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function showSingUp()
    {
        return view('auth.signup');
    }

    public function cadastrarUsuario(UserRequest $request)
    {
        $dados = $request->validated();
    
        $email = $dados['email'];
        $existingUser = User::where('email', $email)->first();

        if ($existingUser) {
            return view('auth.signup')->with('error', 'Já existe um cadastro para este usuário!');
        }

        $user = User::create($dados);

        return redirect()->route('user.success');
    }

    public function UserCreateSuccess()
    {
        return view('auth.userSuccess')->with('delay', 3);
    }
}
