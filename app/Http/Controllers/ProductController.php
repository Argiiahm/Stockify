<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index()
   {
      return view('product', [
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
         "supplier_id"     =>       "required"
      ]);
      
      //   $categories = Categories::findOrFail($request->category_id);
      //   $suppliers = Suppliers::findOrFail($request->supplier_id);


      if ($request->file('image')) {
         $validasiData['image']  =  $request->file('image')->store('product-image', 'public');
      }


      //   $validasiData['category_id'] = $categories->id;
      //   $validasiData['supplier_id'] = $suppliers->id;

         //dd($validasiData);  

      if (Product::create($validasiData)) {
         return redirect('/product');
      } else {
         return back();
      }
   }
}
