<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);



//profile route
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('profile', [App\Http\Controllers\ProfileController::class,'store']);
Route::get('/profile/{profile}', [ProfileController::class, 'show']);

    Route::post('profile/{id}/update', [App\Http\Controllers\ProfileController::class,'update']);
    Route::delete('profile/{profile}', [App\Http\Controllers\ProfileController::class,'destroy']);
    Route::get('profile/{id}/user', [App\Http\Controllers\UserController::class,'getProfile']);
});

//pation route
Route::middleware('auth:sanctum')->group(function () {
    Route::post('pation', [App\Http\Controllers\PationController::class, 'store']);
    Route::get('pation/{pation}', [App\Http\Controllers\PationController::class, 'show']);
    Route::get('pations', [App\Http\Controllers\PationController::class, 'index']);
    Route::put('pation/{pation}', [App\Http\Controllers\PationController::class, 'update']);
    Route::delete('pation/{pation}', [App\Http\Controllers\PationController::class, 'destroy']);
});

//book route

Route::middleware('auth:sanctum')->group(function () {
    Route::post('book', [App\Http\Controllers\BookController::class, 'store']);
    Route::get('book/{book}', [App\Http\Controllers\BookController::class, 'show']);
    // Route::get('pations', [App\Http\Controllers\PationController::class, 'index']);
    Route::put('book/{book}', [App\Http\Controllers\BookController::class, 'update']);
    Route::delete('book/{book}', [App\Http\Controllers\BookController::class, 'destroy']);
});
