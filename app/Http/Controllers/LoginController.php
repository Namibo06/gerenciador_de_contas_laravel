<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function cadastro(){
        return view('cadastro');
    }

    public function cadastrar(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:4|max:40',
            'email'=>'required|email',
            'phone'=>'required',
            'password'=>'required|min:4|max:32'
        ],
    [
        'email.required'=>'Email Obrigatório',
        'password.required'=>'Senha Obrigatório',
        'password.min'=>'Senha Necessita de mais de 4 caracteres',
        'password.max'=>'Senha tem limite de até 32 caracteres',
    ]);

        if($validator->fails()){
            return redirect()->route('cadastro')->withErrors($validator);
        }

        $user=User::create($request->all());

        if($user){
            return redirect()->route('login.login')->with('success','Usuário criado com  sucesso');
        }

        return redirect()->route('cadastro')->with('error','Não foi possivel criar usuário');
    }

    public function login(){
        return view('login');
    }

    public function autenticar(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|min:4|max:32'
        ],
    [
        'email.required'=>'Email Obrigatório',
        'password.required'=>'Senha Obrigatório',
        'password.min'=>'Senha Necessita de mais de 4 caracteres',
        'password.max'=>'Senha tem limite de até 32 caracteres',
    ]);

        if($validator->fails()){
            return redirect()->route('login.login')->withErrors($validator);
        }

        $credentials=$request->only('email','password');

        if(Auth::attempt($credentials)){
            $pegarUsuario=User::where('email',$request->email)->first();

            $cookiesUser = [
                $idCookie=Cookie::make('id_user',$pegarUsuario->id,60*24),
                $nameCookie=Cookie::make('name_user',$pegarUsuario->name,60*24),
                $emailCookie=Cookie::make('email_user',$pegarUsuario->email,60*24),
            ];

            if($pegarUsuario){
                return redirect()->route('home.index')->withCookies($cookiesUser);
            }

            return redirect()->route('login.login')->with('error','Não foi possivel acessar usuário,email inválido');
        }else{
            return redirect()->route('login.login')->with('error','Email/Senha inválidos');
        }
    }
}
