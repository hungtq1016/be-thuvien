<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);


Route::group(['middleware'=> ['auth:sanctum']], function ()
{
    Route::post('/logout', [AuthController::class,'logout']);
    Route::resource('/m',MovieController::class);
});