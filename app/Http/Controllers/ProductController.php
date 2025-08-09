<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Models\User;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
   public function index()
   {
      return view('product', [
         "Users"       =>   User::all(),
         "Product"     =>   Product::all(),
         "Categories"  =>   Categories::all(),
         "Suppliers"   =>   Suppliers::all()
         // $lowStockProduct = Product::where('stok','<'',5)->get();
      ]);
   }

   public function store(Request $request)
   {
      // dd($request->all());   
      $validasiData = $request->validate([
         "name"              =>       "required",
         "sku"               =>       "required",
         "description"       =>       "required",
         "purchase_price"    =>       "required",
         "selling_price"     =>       "required",
         "image"             =>       "nullable|string|image|file|mimes:png,jpg,jpeg",
         "minimum_stock"     =>       "required",
         "category_id"       =>       "required",
         "supplier_id"       =>       "required",
      ]);

      if ($request->file('image')) {
         $validasiData['image']  =  $request->file('image')->store('product-image', 'public');
      }

      $validasiData['slug']  = Str::slug($request->name);


      if (Product::create($validasiData)) {
         if (Auth::user()->role == "Admin") {
            alert()->success('SuccessAlert', 'Barang Berhasil DiTambahkan!');
            return redirect('/admin/produk');
         } elseif (Auth::user()->role == "Manajer gudang") {
            alert()->success('SuccessAlert', 'Barang Berhasil DiTambahkan!');
            return redirect('/management_gudang');
         }
      } else {
         return back();
         alert()->success('warningAlert', 'Barang Gagal DiTambahkan!');
      }
   }

   public function edit(Product $Product)
   {
      // dd($Product);
      return view('product.form-edit-product', [
         "Data"         =>    $Product,
         "Suppliers"    =>    Suppliers::all(),
         "Categories"   =>    Categories::all()
      ]);
   }

   //update

   public function update(Request $request, Product $Product)
   {
      $validasiData = $request->validate([
         "name"            =>       "required",
         "sku"             =>       "required",
         "description"     =>       "required",
         "purchase_price"  =>       "required",
         "selling_price"   =>       "required",
         "image"           =>       "nullable|image|file|mimes:png,jpg,jpeg",
         "minimum_stock"   =>       "required",
         "category_id"     =>       "required",
         "supplier_id"     =>       "required",
      ]);

      if ($request->file('image')) {
         $validasiData['image']  =  $request->file('image')->store('product-image', 'public');
      }

      if ($validasiData['name'] != $request->name) {
         $validasiData['slug'] = Str::slug($request->name);
      }

      if ($Product->update($validasiData)) {
         if (Auth::user()->role == "Admin") {
            alert()->success('SuccessAlert', 'Barang Berhasil Di Ubah!');
            return redirect('/admin/produk');
         }
      } else {
         return back();
         alert()->success('warningAlert', 'Barang Gagal Di Ubah!');
      }
   }

   //delete
   public function delete(Product $Product)
   {
      if ($Product->delete($Product->id)) {
         if (Auth::user()->role == "Admin") {
            alert()->success('SuccessAlert', 'Barang Berhasil Di Hapus!');
            return redirect('/admin/produk');
         }
      } else {
         return back();
         alert()->success('warningAlert', 'Barang Gagal Di Hapus!');
      }
   }

   // Details
   public function details(Product $product)
   {
      return view('product.details-product.index', [
         "product" => $product,
         "all"     =>  Product::all()
      ]);
   }

   public function export()
   {
      return Excel::download(new ProductExport, 'product.xlsx');
   }

   public function import(Request $request)
   {

      $request->validate([
         "file"      =>     "required|mimes:xlsx,xls,csv"
      ]);

      if (Excel::import(new ProductImport, $request->file('file'))) {
         alert()->success('Berhasil Import Data');
         return redirect('/admin/produk');
      };
   }
}
