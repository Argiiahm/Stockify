<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class ManagementGudangContoller extends Controller
{
    public function index() {
        return view('ManageGudang.index',[
            "Product"  =>     Product::all(),
            "Suppliers"  =>   Suppliers::all(),
            "Categories"  =>  Categories::all()
        ]);
    }
}
