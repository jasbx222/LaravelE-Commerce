<?php

use App\Http\Controllers\V1\Auth\AdminAuthController;
use App\Http\Controllers\V1\Cart\CartController;
use App\Http\Controllers\V1\CartItems\CartItemController;
use App\Http\Controllers\V1\Categories\CategorieController;
use App\Http\Controllers\V1\Products\ProductController;
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

//auth routes for admin
Route::prefix('admin/v1/auth')->group(function () {
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/profile', [AdminAuthController::class, 'index'])->middleware('auth:sanctum');
    Route::post('/register', [AdminAuthController::class, 'register']);
});


//CART
Route::prefix('admin/v1/carts')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CartController::class, 'index']);
    Route::get('/{cart}', [\App\Http\Controllers\V1\Cart\CartController::class, 'show']);
    Route::post('/create/carts', [\App\Http\Controllers\V1\Cart\CartController::class, 'store']);
    Route::put('/{cart}/update', [\App\Http\Controllers\V1\Cart\CartController::class, 'update']);
    Route::delete('/{cart}/delete', [\App\Http\Controllers\V1\Cart\CartController::class, 'destroy']);
});

//products
Route::prefix('admin/v1/products')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ProductController::class, 'index']);

    Route::post('/create', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::put('/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');

});

//categories
Route::prefix('admin/v1/categories')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CategorieController::class, 'index']);
    Route::get('/{categorie}', [CategorieController::class, 'show']);
    Route::delete('/{categorey}/delete', [CategorieController::class, 'delete']);
    Route::post('/', [CategorieController::class, 'store']);
    Route::put('/{categorey}/update', [CategorieController::class, 'update']);
   
});
Route::prefix('admin/v1/cart_items')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CartItemController::class, 'index']);
    Route::get('/{cartItem}', [CartItemController::class, 'show']);
    Route::delete('/{cartItem}/delete', [CartItemController::class, 'delete']);
    Route::post('/', [CartItemController::class, 'store']);
    Route::put('/{cartItem}/update', [CartItemController::class, 'update']);
   
});




//route for client 

//auth routes for admin
Route::prefix('client/v1/auth')->group(function () {
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/profile', [AdminAuthController::class, 'index'])->middleware('auth:sanctum');
    Route::post('/register', [AdminAuthController::class, 'register']);
});


//CART
Route::prefix('client/v1/carts')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CartController::class, 'index']);
    Route::get('/{cart}', [\App\Http\Controllers\V1\Cart\CartController::class, 'show']);
 
});

//products
Route::prefix('client/v1/products')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ProductController::class, 'index']);

    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');

});

//categories
Route::prefix('client/v1/categories')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CategorieController::class, 'index']);
    Route::get('/{categorie}', [CategorieController::class, 'show']);
   
   
});
Route::prefix('client/v1/cart_items')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CartItemController::class, 'index']);
    Route::get('/{cartItem}', [CartItemController::class, 'show']);
   
   
});