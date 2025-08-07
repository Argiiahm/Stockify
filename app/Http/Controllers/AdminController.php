<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Suppliers;
use App\Models\Categories;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $count = Product::count();
        $stokMasuk = [];
        $stokKeluar = [];
        $product = Product::all();

        [$tahun, $bulan] = explode('-', now()->format('Y-m'));


        $today = now()->toDateString();

        foreach ($product as $p) {


            $stokMasuk[] = $p->stock()->where('type', 'masuk')->where('status', 'diterima')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)->sum('quantity');

            $stokKeluar[] = $p->stock()->where('type', 'keluar')->where('status', 'dikeluarkan')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)->sum('quantity');
        }

        return view('Admin.dashboard.dashboard-admin', [
            "count"        =>    $count,
            "Product"      =>    Product::all(),
            "stock"        =>    Stock::all(),
            "stokMasuk"    =>    $stokMasuk,
            "stokKeluar"   =>    $stokKeluar,
            "Activity"     =>    UserActivity::whereDate('created_at', $today)->get(),

        ]);
    }


    public function stock()
    {
        $count = Product::count();

        $product = Product::all();

        $stokMasuk = [];
        $stokKeluar = [];

        foreach ($product as $p) {

            $stokMasuk[] = $p->stock()->where('type', 'masuk')->where('status', 'diterima')->sum('quantity');
            $stokKeluar[] = $p->stock()->where('type', 'keluar')->where('status', 'dikeluarkan')->sum('quantity');
        }


        return view('Admin.dashboard.admin-stock', [
            "count"  =>  $count,
            "product" =>  Product::all(),
            "stockMasuk" =>  $stokMasuk,
            "stockKeluar" =>  $stokKeluar
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m',
        ]);

        // dd($request->month);

        [$tahun, $bulan] = explode('-', $request->month);
        $stokMasuk = [];
        $stokKeluar = [];
        $product = Product::all();

        $today = now()->toDateString();

        foreach ($product as $p) {
            $stokMasuk[] = $p->stock()
                ->where('type', 'masuk')
                ->where('status', 'diterima')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->sum('quantity');

            $stokKeluar[] = $p->stock()
                ->where('type', 'keluar')
                ->where('status', 'dikeluarkan')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->sum('quantity');
        }

        return view('Admin.dashboard.dashboard-admin', [
            "count"        => Product::count(),
            "Product"      => Product::all(),
            "stock"        => Stock::all(),
            "stokMasuk"    => $stokMasuk,
            "stokKeluar"   => $stokKeluar,
            "Activity"     => UserActivity::whereDate('created_at', $today)->get(),
        ]);
    }

    public function product()
    {

        $count = Product::count();
        return view('Admin.admin-product', [
            "Product"     =>     Product::all(),
            "Suppliers"   =>   Suppliers::all(),
            "Categories"  =>  Categories::all(),
            "Attribute"   =>   Attribute::all(),
            "count"       =>   $count,
        ]);
    }

    public function supplier()
    {
        $count = Suppliers::count();
        return view('Admin.dashboard.admin-suppliers', [
            "Suppliers"   =>  Suppliers::all(),
            "count"       =>  $count
        ]);
    }

    public function pengguna()
    {
        $count = User::count();
        return view('Admin.dashboard.admin-pengguna', [
            "count"   =>   $count,
            "Users"   =>    User::all()
        ]);
    }

    public function laporan()
    {
        $DataMasuk = Stock::where('type', 'masuk')->where('status', 'diterima')->get();
        $DataKeluar = Stock::where('type', 'keluar')->where('status', 'dikeluarkan')->get();

        return view('Admin.laporan.index', [
            "categories"     =>    Categories::all(),
            "category"       =>    Categories::withcount('products')->get(),
            "DataStock"      =>    Product::all(),
            "actv"           =>    UserActivity::latest()->get(),
            "stockMasuk"     =>   $DataMasuk,
            "stockKeluar"    =>   $DataKeluar
        ]);
    }

    // Laporan
    public function laporan_by_category(Categories $categories)
    {
        $product = Product::where('category_id', $categories->id)->get();
        return view('laporan.laporan-by_category', [
            "data"     =>     $categories,
            "product"  =>     $product,
        ]);
    }

    public function minimumstock(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'minimum_stock' => 'required|integer',
        ]);

        // Cek tombol mana yang diklik
        $action = $request->input('action');
        $newStock = $request->minimum_stock;

        if ($action === 'increment') {
            $newStock = $newStock + 1;
        } elseif ($action === 'decrement') {
            $newStock = $newStock - 1;
        }

        $product->update([
            'minimum_stock' => $newStock,
        ]);

        return back()->with('success', 'Minimum stock berhasil diperbarui');
    }
}
