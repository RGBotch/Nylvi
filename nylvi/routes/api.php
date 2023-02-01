<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TailleController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user:id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{user:id}', [UserController::class, 'update']);
Route::delete('/users/{user:id}', [UserController::class, 'destroy']);

Route::get('/tailles', [TailleController::class, 'index']);
Route::get('/tailles/{taille:id}', [TailleController::class, 'show']);
Route::post('/tailles', [TailleController::class, 'store']);
Route::put('/tailles/{taille:id}', [TailleController::class, 'update']);
Route::delete('/tailles/{taille:id}', [TailleController::class, 'destroy']);

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
