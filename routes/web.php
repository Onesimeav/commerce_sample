<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

Route::get('/', function () {
    return view('index');
});

Route::get('product/create',[ProductsController::class, 'create']);
Route::post('product/create', [ProductsController::class, 'store']);

Route::get('product/read',[ProductsController::class,'read']);

Route::get('product/update/{id}',[ProductsController::class,'edit']);
Route::put('product/update/{id}', [ProductsController::class, 'update']);

Route::get('product/delete/{id}', [ProductsController::class, 'delete']);

Route::get('product/update-image/{id}', [ProductsController::class, 'editImage']);
Route::put('product/update-image/{id}', [ProductsController::class, 'updateImage']);

Route::get('product/view/{id}', [ProductsController::class, 'view_product']);

Route::post('product/add-cat/{id}', [CartsController::class,'addToCart']);

