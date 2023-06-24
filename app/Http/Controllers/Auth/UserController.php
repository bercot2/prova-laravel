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
        return view('auth.singup');
    }

    public function cadastrarUsuario(UserRequest $request)
    {
        $dados = $request->validated();

        $user = User::create($dados);

        return redirect()->route('user.success');
    }

    public function UserCreateSuccess()
    {
        return view('auth.userSuccess')->with('delay', 3);
    }
}
