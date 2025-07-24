<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Suppliers;

class ManagementGudangContoller extends Controller
{
    public function dashboard()
    {
        $today = now()->toDateString();
        $Data = Product::whereDate('created_at', $today)->get();
        return view('ManageGudang.index', [
            "DataToday"     =>   $Data
        ]);
    }

    public function produk()
    {
        return view('ManageGudang.produk');
    }

    public function supplier()
    {
        return view('ManageGudang.supplier');
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
            "Product"  =>     Product::paginate(3),
            "Suppliers"  =>   Suppliers::all(),
            "Categories"  =>  Categories::all(),
            "Products"     => $allProduct,
            "DataToday"     =>   $Data

        ]);
    }
}
