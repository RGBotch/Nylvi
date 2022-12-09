<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PanierController;
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

Route::get('/paniers', [PanierController::class, 'index']);
Route::get('/paniers/{panier:id}', [PanierController::class, 'show']);
Route::post('/paniers', [PanierController::class, 'store']);
Route::put('/paniers/{panier:id}', [PanierController::class, 'update']);
Route::delete('/paniers/{panier:id}', [PanierController::class, 'destroy']);

Route::get('/artistes', [ArtisteController::class, 'index']);
Route::get('/artistes/{artiste:id}', [ArtisteController::class, 'show']);
Route::post('/artistes', [ArtisteController::class, 'store']);
Route::put('/artistes/{artiste:id}', [ArtisteController::class, 'update']);
Route::delete('/artistes/{artiste:id}', [ArtisteController::class, 'destroy']);

Route::get('/categories', [CategorieController::class, 'index']);
Route::get('/categories/{categorie:id}', [CategorieController::class, 'show']);
Route::post('/categories', [CategorieController::class, 'store']);
Route::put('/categories/{categorie:id}', [CategorieController::class, 'update']);
Route::delete('/categories/{categorie:id}', [CategorieController::class, 'destroy']);
