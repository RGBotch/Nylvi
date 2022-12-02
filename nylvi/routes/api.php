<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\CategorieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product:id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{product:id}', [ProductController::class, 'update']);
Route::delete('/products/{product:id}', [ProductController::class, 'destroy']);

Route::get('/artistes', [ArtisteController::class, 'index']);

Route::get('/categories', [CategorieController::class, 'index']);
Route::get('/categories/{categorie:id}', [CategorieController::class, 'show']);
Route::post('/categories', [CategorieController::class, 'store']);
Route::put('/categories/{categorie:id}', [CategorieController::class, 'update']);
Route::delete('/categories/{categorie:id}', [CategorieController::class, 'destroy']);
