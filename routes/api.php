<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/book',BookController::class);
Route::resource('/category',CategoryController::class);
Route::post('book/searchbook',[BooksController::class,'search']);
Route::post('/book/favorite',[BooksController::class,'favorite']);
Route::group([
    'middleware'=>'api',
    'prefix'=>'auth',
], function(){
    Route::post('/login', [AuthController::class,'login'])->name('login');
    Route::post('/registrasi', [AuthController::class,'registration']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::post('/refresh', [AuthController::class,'refresh']);
    Route::post('/me', [AuthController::class,'me']);
});
Route::post('/book/cart',[BooksController::class,'cart']);
Route::get('/book/cart/me',[BooksController::class,'cartme']);
// Route::resource('/cartme', CartController::class);