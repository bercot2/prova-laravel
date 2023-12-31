<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $data){
        if (request()->isMethod('POST')){
            $login = $data->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            if (Auth::attempt($login)){
                return redirect()->route('portal');
            } else {
                return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos');
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function showPortal(){
        $id_user = auth()->id();

        $user = User::where('id', $id_user)->first();

        return view('portal.portal', ['user' => $user->email]);
    }
}
