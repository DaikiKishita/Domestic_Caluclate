<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SampleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('sample',SampleController::class.'@index');
