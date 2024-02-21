<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

// Rutas auth
Route::controller(AuthController::class)->group(function () {
    Route::post('/users/register', 'register');
    Route::post('/users/login', 'login');
    Route::middleware('auth:sanctum')
        ->post('/users/logout', 'logout');
});

// Rutas products
Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/products/{product}', 'show');
    Route::middleware('auth:sanctum')
        ->post('/products/', 'store');
});
