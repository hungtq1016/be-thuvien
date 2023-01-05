<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;

Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);


Route::group(['middleware'=> ['auth:sanctum']], function ()
{
    Route::post('/logout', [AuthController::class,'logout']);
    Route::resource('/movie',MovieController::class);
    Route::resource('/category',CategoryController::class);
    Route::put('category/{category}/update', [CategoryController::class,'updateStatus']);

});