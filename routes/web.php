<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\HistoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',function(){
    return view('login');
});

Route::post('/user/logout',[UserController::class,'logout']);

Route::get('/user/register',function(){
    return view('register');
});

Route::post('/user/store',[UserController::class,'store']);

Route::post('/user/login',[UserController::class,'login']);

Route::get('/history',[HistoryController::class,'index']);

Route::post('/history/store',[HistoryController::class,'store']);

Route::post('/history/search',[HistoryController::class,'search']);