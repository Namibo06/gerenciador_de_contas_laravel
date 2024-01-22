<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/cadastro',[LoginController::class,'cadastro'])->name('cadastro');
Route::post('/cadastrar',[LoginController::class,'cadastrar'])->name('cadastro.cadastrar');

Route::get('/home',[HomeController::class,'index'])->name('home.index');

Route::get('/login',[LoginController::class,'login'])->name('login.login');
Route::post('/autenticar',[LoginController::class,'autenticar'])->name('login.autenticar');

Route::get('/criar-conta-pagar',[HomeController::class,'criar_conta_pagar'])->name('criar-conta-pagar');
Route::post('/conta-pagar',[HomeController::class,'conta_pagar'])->name('conta_pagar');
Route::get('/criar-conta-receber',[HomeController::class,'criar_conta_receber'])->name('criar-conta-receber');
Route::post('/conta-receber',[HomeController::class,'conta_receber'])->name('conta_receber');

Route::fallback(function(){
    return view('login');
});
