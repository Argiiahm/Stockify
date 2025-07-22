<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { 
    return view('app');
})->middleware('auth');

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/masuk',[AuthController::class, 'masuk']);

Route::get('/register',[AuthController::class, 'register']);
Route::post('/daftar',[AuthController::class, 'daftar']);

Route::get('/product',[ProductController::class, 'index'])->middleware('auth');
Route::post('/product/store',[ProductController::class, 'store'])->middleware('auth');

Route::get('/category',[CategoriesController::class, 'index'])->middleware('auth');
Route::get('/category/edit/{category:id}',[CategoriesController::class, 'edit'])->middleware('auth');
Route::post('/category/store',[CategoriesController::class, 'store'])->middleware('auth');
Route::delete('/category/{category:id}',[CategoriesController::class, 'destroy'])->middleware('auth');
Route::put('/category/update/{category:id}',[CategoriesController::class, 'update'])->middleware('auth');

Route::post('/suppliers',[SuppliersController::class, 'store']);
Route::delete('/suppliers/{suppliers:id}',[SuppliersController::class, 'destroy']);
Route::get('/suppliers/edit/{suppliers:id}',[SuppliersController::class, 'edit']);
Route::put('/suppliers/update/{suppliers:id}',[SuppliersController::class, 'update']);


Route::get('/stock',[StockController::class, 'index']);
