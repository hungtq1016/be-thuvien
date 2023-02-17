<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

    Route::post('/login', [AuthController::class, 'admin_login']);
    Route::post('/register', [AuthController::class, 'register']);

    // API get without auth
    Route::resource('/author', AuthorController::class, ['only' => ['index','show']]);
    Route::resource('/category', CategoryController::class, ['only' => ['index','show']]);
    Route::resource('/tag', TagController::class, ['only' => ['index','show']]);
    Route::resource('/book', BookController::class, ['only' => ['index','show']]);
    Route::resource('/user', UserController::class, ['only' => ['index','show']]);
    Route::resource('/bookshelf', BookshelfController::class, ['only' => ['index','show']]);
    //End API get all without auth
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('/author', AuthorController::class, ['except' => ['index','show']]);
    Route::resource('/category', CategoryController::class, ['except' => ['index','show']]);
    Route::resource('/tag', TagController::class, ['except' => ['index','show']]);
    Route::resource('/book', BookController::class, ['except' => ['index','show']]);
    Route::resource('/user', UserController::class, ['except' => ['index','show']]);
    Route::resource('/bookshelf', BookshelfController::class, ['except' => ['index','show']]);


    Route::put('category/{category}/update', [CategoryController::class, 'updateStatus']);
    Route::put('tag/{tag}/update', [TagController::class, 'updateStatus']);
    Route::put('author/{author}/update', [AuthorController::class, 'updateStatus']);

    Route::get('get-col-name/{value}', [DbController::class, 'index']);
    Route::get('getdb/{value}', [DbController::class, 'index2']);
});
