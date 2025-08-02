<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class ManagementGudangContoller extends Controller
{
    public function dashboard()
    {

        $today =  now()->toDateString();

        $DataMasuk = Stock::whereDate('created_at', $today)->where('type', 'masuk')->where('status', 'diterima')->get();
        $DataKeluar = Stock::whereDate('created_at', $today)->where('type', 'keluar')->where('status', 'dikeluarkan')->get();

        // dd($DataMasuk);
        return view('ManageGudang.index', [
            "stockMasuk"     =>   $DataMasuk,
            "stockKeluar"    =>   $DataKeluar,
            "product"        =>   Product::all()
        ]);
    }

    public function produk()
    {
        return view('ManageGudang.produk', [
            "product"     =>     Product::all()
        ]);
    }

    public function detail(Product $product)
    {
        return view('ManageGudang.details-product', [
            "product"   =>    $product
        ]);
    }

    public function supplier()
    {
        return view('ManageGudang.supplier', [
            "Suppliers"   => Suppliers::all()
        ]);
    }
    public function laporan()
    {
        return view('ManageGudang.laporan', [
            "categories"    =>    Categories::all(),
            "category"      =>    Categories::withcount('products')->get(),
            "DataStock"     =>    Product::all(),
        ]);
    }

    // Laporan
    public function laporan_by_category(Categories $categories)
    {
        $product = Product::where('category_id', $categories->id)->get();
        return view('laporan.laporan-by_category', [
            "data"     =>     $categories,
            "product"  =>     $product,
        ]); {
        }
    }

    
    public function stock()
    {
        $allProduct = Product::all();
        $today = now()->toDateString();

        $Data = Product::whereDate('created_at', $today)->get();
        return view('ManageGudang.stock', [
            "Product"   =>       Product::all(),
            "Suppliers"  =>      Suppliers::all(),
            "Categories"  =>     Categories::all(),
            "Products"     =>    $allProduct,
            "DataToday"     =>   $Data
        ]);
    }

    public function tfStock(Request $request)
    {
        $validasiData = $request->validate([
            "product_id" => "required|exists:products,id",
            "type"       => "required|in:masuk,keluar",
            "quantity"   => "required|integer|min:1",
            "date"       => "required|date",
            "status"     => "required|in:pending,diterima,ditolak,dikeluarkan",
            "note"       => "nullable|string"
        ]);

        $validasiData['user_id'] = Auth::id();
        $product = Product::findOrFail($validasiData["product_id"]);
        $validasiData['slug'] = Str::slug($product->name);

        $stokM = $product->stock->where('type', 'masuk')->where('status', 'diterima')->sum('quantity');
        $stokK = $product->stock->where('type', 'keluar')->where('status', 'dikeluarkan')->sum('quantity');

        $output = $stokM - $stokK;

        if ($validasiData['type'] === 'keluar' && $validasiData['quantity'] > $output) {
            alert()->warning('Gagal!', 'Stok tidak mencukupi! Tersedia: ' . $output);
            return back();
        }

        stock::create($validasiData);
        alert()->success('Berhasil!');
        return back();
    }
}
