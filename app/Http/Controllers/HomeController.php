<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index()
    {
        $idCookie = Cookie::get('id_user');
        $nameCookie = Cookie::get('name_user');
        return view('home',['id_user'=>$idCookie,'name_user'=>$nameCookie]);
    }

    public function criar_conta_pagar(){
        return view('criar_conta_pagar');
    }
}
