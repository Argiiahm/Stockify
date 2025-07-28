<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class ManagementGudangContoller extends Controller
{
    public function dashboard()
    {
        $today = now()->toDateString();
        $Data = Product::whereDate('created_at', $today)->get();
        return view('ManageGudang.index', [
            "DataToday"     =>   $Data,
            // "Products"      =>   Product::all()
        ]);
    }

    public function produk()
    {
        return view('ManageGudang.produk',);
    }

    public function supplier()
    {
        return view('ManageGudang.supplier', [
            "Suppliers"   => Suppliers::all()
        ]);
    }
    public function laporan()
    {
        return view('ManageGudang.laporan');
    }

    public function stock()
    {
        $allProduct = Product::all();
        $today = now()->toDateString();
        $Data = Product::whereDate('created_at', $today)->get();
        return view('ManageGudang.stock', [
            "Product"  =>     Product::all(),
            "Suppliers"  =>   Suppliers::all(),
            "Categories"  =>  Categories::all(),
            "Products"     => $allProduct,
            "DataToday"     =>   $Data
        ]);
    }

    public function tfStock(Request $request)
    {
        $validasiData = $request->validate([
            "product_id" => "required|exists:products,id",
            "type" => "required|in:masuk,keluar",
            "quantity" => "required|integer|min:1",
            "date" => "required|date",
            "status" => "required|in:pending,diterima,ditolak,dikeluarkan",
            "note"   =>  "nullable"
        ]);

        $validasiData['user_id'] = Auth::id();
        $product = Product::findOrFail($validasiData["product_id"]);

        $stokM = $product->stock->where('type', 'masuk')->where('status', 'diterima')->sum('quantity');
        $stokK = $product->stock->where('type', 'keluar')->where('status', 'dikeluarkan')->sum('quantity');

        $output = $stokM - $stokK;

        if ($validasiData['type'] === 'masuk' && $validasiData['quantity'] < $product->minimum_stock) {
            alert()->warning('Gagal!', 'Minimal Stok Masuk: ' . $product->minimum_stock);
            return back();
        }

        if ($validasiData['type'] === 'keluar' && $validasiData['quantity'] > $output) {
            alert()->warning('Gagal!', 'Stok tidak mencukupi! Tersedia: ' . $output);
            return back();
        }


        Stock::create($validasiData);
        alert()->success('Berhasil!');
        return back();
    }
}
