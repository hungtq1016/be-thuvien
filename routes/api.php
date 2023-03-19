<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

    Route::post('/login', [AuthController::class, 'admin_login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/search', [SearchController::class, 'search']);

    // API get without auth
    Route::resource('/author', AuthorController::class, ['only' => ['index','show']]);
    Route::resource('/comment', CommentController::class, ['only' => ['index','show']]);
    Route::resource('/category', CategoryController::class, ['only' => ['index','show']]);
    Route::resource('/tag', TagController::class, ['only' => ['index','show']]);
    Route::resource('/book', BookController::class, ['only' => ['index','show']]);
    Route::resource('/user', UserController::class, ['only' => ['index','show']]);
    Route::resource('/bookshelf', BookshelfController::class, ['only' => ['index','show']]);
    Route::resource('/major', MajorController::class, ['only' => ['index','show']]);
    Route::resource('/role', RoleController::class, ['only' => ['index','show']]);
    Route::resource('/publisher', PublisherController::class, ['only' => ['index','show']]);
    Route::resource('/language', LanguageController::class, ['only' => ['index','show']]);
    Route::resource('/image', ImageController::class, ['only' => ['index','show']]);
    Route::resource('/loan', LoanController::class, ['only' => ['index','show']]);
    Route::resource('/favorite', FavoriteController::class, ['only' => ['index','show']]);


    //End API get all without auth
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('/author', AuthorController::class, ['except' => ['index','show']]);
    Route::resource('/comment', CommentController::class, ['except' => ['index','show']]);
    Route::resource('/category', CategoryController::class, ['except' => ['index','show']]);
    Route::resource('/tag', TagController::class, ['except' => ['index','show']]);
    Route::resource('/book', BookController::class, ['except' => ['index','show']]);
    Route::resource('/user', UserController::class, ['except' => ['index','show']]);
    Route::resource('/bookshelf', BookshelfController::class, ['except' => ['index','show']]);
    Route::resource('/major', MajorController::class, ['except' => ['index','show']]);
    Route::resource('/role', RoleController::class, ['except' => ['index','show']]);
    Route::resource('/publisher', PublisherController::class, ['except' => ['index','show']]);
    Route::resource('/language', LanguageController::class, ['except' => ['index','show']]);
    Route::resource('/image', ImageController::class, ['except' => ['index','show']]);
    Route::resource('/loan', LoanController::class, ['except' => ['index','show']]);
    Route::resource('/favorite', FavoriteController::class, ['except' => ['index','show']]);


    Route::patch('author/{author}/update', [AuthorController::class, 'updateStatus']);
    Route::patch('category/{category}/update', [CategoryController::class, 'updateStatus']);
    Route::patch('tag/{tag}/update', [TagController::class,'updateStatus']);
    Route::patch('book/{book}/update', [BookController::class,'updateStatus']);
    Route::patch('user/{user}/update', [UserController::class,'updateStatus']);
    Route::patch('bookshelf/{bookshelf}/update', [BookshelfController::class,'updateStatus']);
    Route::patch('major/{major}/update', [MajorController::class,'updateStatus']);
    Route::patch('role/{role}/update', [RoleController::class,'updateStatus']);
    Route::patch('publisher/{publisher}/update', [PublisherController::class,'updateStatus']);
    Route::patch('language/{language}/update', [LanguageController::class, 'updateStatus']);
    Route::patch('image/{image}/update', [ImageController::class, 'updateStatus']);


});
