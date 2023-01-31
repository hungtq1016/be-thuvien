<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

Route::post('/login', [AuthController::class,'admin_login']);
Route::post('/register', [AuthController::class,'register']);


Route::group(['middleware'=> ['auth:sanctum']], function ()
{
    Route::post('/logout', [AuthController::class,'logout']);

    Route::resource('/actor',ActorController::class);
    Route::resource('/director',DirectorController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/tag',TagController::class);
    Route::resource('/movie',MovieController::class);
    Route::resource('/user',UserController::class);

    Route::put('category/{category}/update', [CategoryController::class,'updateStatus']);
    Route::put('tag/{tag}/update', [TagController::class,'updateStatus']);
    Route::put('actor/{actor}/update', [ActorController::class,'updateStatus']);
    Route::put('director/{director}/update', [DirectorController::class,'updateStatus']);

    Route::get('get-col-name/{value}', [DbController::class, 'index']);
    Route::get('getdb/{value}', [DbController::class, 'index2']);
});
