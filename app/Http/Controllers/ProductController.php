<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
      ]);
   }

   public function store(Request $request)
   {
      // dd($request->all());   
      $validasiData = $request->validate([
         "name"            =>       "required",
         "sku"             =>       "required",
         "description"     =>       "required",
         "purchase_price"  =>       "required",
         "selling_price"   =>       "required",
         "image"           =>       "image|file|mimes:png,jpg,jpeg",
         "minimum_stock"   =>       "required",
         "category_id"     =>       "required",
         "supplier_id"     =>       "required",
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

   // Details
   public function details(Product $product) {
      return view('product.details-product.index',[
         "product" => $product,
         "all"     =>  Product::all()
      ]);
   }
}
