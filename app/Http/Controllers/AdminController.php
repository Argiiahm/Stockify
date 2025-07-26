<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Suppliers;
use App\Models\Categories;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $count = Product::count();
        $stokMasuk = [];
        $stokKeluar = [];
        $product = Product::all();


        foreach ($product as $p) {

            $stokMasuk[] = $p->stock()->where('type', 'masuk')->where('status', 'diterima')->sum('quantity');
            $stokKeluar[] = $p->stock()->where('type', 'keluar')->where('status', 'dikeluarkan')->sum('quantity');
        }

        return view('Admin.dashboard.dashboard-admin', [
            "count"   =>   $count,
            "Product"  =>     Product::all(),
            "stock"        => Stock::all(),
            "stokMasuk"  =>  $stokMasuk,
            "stokKeluar"  =>  $stokKeluar

        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m',
        ]);

        [$tahun, $bulan] = explode('-', $request->month);

        $stokMasuk = [];
        $stokKeluar = [];
        $product = Product::all();

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
            "count" => Product::count(),
            "Product" => Product::paginate(4),
            "stock" => Stock::all(),
            "stokMasuk" => $stokMasuk,
            "stokKeluar" => $stokKeluar,
        ]);
    }



    public function product()
    {
        $count = Product::count();
        return view('Admin.admin-product', [
            "Product"  =>     Product::paginate(4),
            "Suppliers"  =>   Suppliers::all(),
            "Categories"  =>  Categories::all(),
            "Attribute"   =>   Attribute::all(),
            "count"   =>   $count
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
}
