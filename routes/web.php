<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttributesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ManagementGudangContoller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SuppliersController;
use App\Models\Product;
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
    return view('app',[
        "Products"  =>    Product::all(),
    ]);
})->middleware('auth');


//User Login
Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/masuk',[AuthController::class, 'masuk'])->middleware('guest');
Route::delete('/logout',[AuthController::class, 'logout'])->middleware('auth');


//Pengguna
Route::post('/pengguna',[AuthController::class, 'store'])->middleware('admin');
Route::get('/pengguna/edit/{pengguna:id}',[AuthController::class, 'edit'])->middleware('admin');
Route::put('/pengguna/update/{pengguna:id}',[AuthController::class, 'update'])->middleware('admin');
Route::delete('/pengguna/delete/{pengguna:id}',[AuthController::class, 'delete'])->middleware('admin');



//Halaman Admin
Route::get('/admin/dashboard',[AdminController::class, 'index'])->middleware('admin');
Route::get('/admin/dashboard/search',[AdminController::class, 'search'])->middleware('admin');
Route::get('/admin/produk',[AdminController::class, 'product'])->middleware('admin');
// Route::get('/admin/stock',[AdminController::class, 'stock'])->middleware('admin');
Route::get('/admin/supplier',[AdminController::class, 'supplier'])->middleware('admin');
Route::get('/admin/pengguna',[AdminController::class, 'pengguna'])->middleware('admin');
Route::get('/admin/laporan',[AdminController::class, 'laporan'])->middleware('admin');
Route::get('/admin/pengaturan',[AdminController::class, 'pengaturan'])->middleware('admin');



//Product CRUD - Admin Akses
Route::post('/product/store',[ProductController::class, 'store'])->middleware('admin_gudang');



//Categories CRUD - Admin Akses
Route::get('/category',[CategoriesController::class, 'index'])->middleware('admin');
Route::get('/category/edit/{category:id}',[CategoriesController::class, 'edit'])->middleware('admin');
Route::post('/category/store',[CategoriesController::class, 'store'])->middleware('admin');
Route::delete('/category/{category:id}',[CategoriesController::class, 'destroy'])->middleware('admin');
Route::put('/category/update/{category:id}',[CategoriesController::class, 'update'])->middleware('admin');


//atribut CRUD - Admin Akses
Route::post('/attribute/store',[AttributesController::class, 'store'])->middleware('admin');
Route::delete('/attribute/delete/{attribute:id}',[AttributesController::class, 'destroy'])->middleware('admin');
Route::get('/attribute/edit/{attribute:id}',[AttributesController::class, 'edit'])->middleware('admin');
Route::put('/attribute/update/{attribute:id}',[AttributesController::class, 'update'])->middleware('admin');


//Suppliers CRUD - Admin Akses
Route::post('/suppliers',[SuppliersController::class, 'store'])->middleware('admin');
Route::delete('/suppliers/{suppliers:id}',[SuppliersController::class, 'destroy'])->middleware('admin');
Route::get('/suppliers/edit/{suppliers:id}',[SuppliersController::class, 'edit'])->middleware('admin');
Route::put('/suppliers/update/{suppliers:id}',[SuppliersController::class, 'update'])->middleware('admin');  


//Management Gudang
Route::get('/management_gudang/dashboard',[ManagementGudangContoller::class, 'dashboard'])->middleware('admin_gudang');
Route::get('/management_gudang/produk',[ManagementGudangContoller::class, 'produk'])->middleware('admin_gudang');
Route::get('/management_gudang/stock',[ManagementGudangContoller::class, 'stock'])->middleware('admin_gudang');
Route::get('/management_gudang/supplier',[ManagementGudangContoller::class, 'supplier'])->middleware('admin_gudang');
Route::get('/management_gudang/laporan',[ManagementGudangContoller::class, 'laporan'])->middleware('admin_gudang');

//Management Gudang -- Transaksi Stok Masuk Dan Keluar
Route::post('/transaksi/stock',[ManagementGudangContoller::class, 'tfStock'])->middleware('admin_gudang');
Route::get('/transaksi/stock/edit/{stock:id}',[ManagementGudangContoller::class, 'editStock'])->middleware('admin_gudang');
Route::put('/transaksi/stock/update/{stock:id}',[ManagementGudangContoller::class, 'updateStock'])->middleware('admin_gudang');
Route::delete('/transaksi/stock/delete/{stock:id}',[ManagementGudangContoller::class, 'deleteStock'])->middleware('admin_gudang');

//Staff Gudang
Route::get('/staffgudang/dashboard',[StaffController::class, 'dashboard'])->middleware('admin_all');
Route::get('/staffgudang/stock',[StaffController::class, 'stock'])->middleware('admin_all');

//Stock
Route::put('/stock/ubahstatus/{stock:id}',[StaffController::class, 'ubahStatus'])->middleware('admin_all');
Route::delete('/stock/hapus/{stock:id}',[StaffController::class, 'hapusStock'])->middleware('admin_all');
Route::put('/stock/return/{stock:id}',[StaffController::class, 'returnStock'])->middleware('admin_all');
Route::put('/stock/keluar/{stock:id}',[StaffController::class, 'keluarStock'])->middleware('admin_all');






