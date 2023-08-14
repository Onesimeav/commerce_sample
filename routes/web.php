<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductControllers;
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

Route::get('/product/create', function (){
    return view('create');
});

Route::post('product/create', [ProductControllers::class,'validator']);
