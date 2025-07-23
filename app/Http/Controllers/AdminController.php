<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Suppliers;
use App\Models\Categories;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index() {
        $count = Product::count();
        return view('Admin.dashboard.dashboard-admin',[
            "count"   =>   $count
        ]);
    }

    public function product() {
        $count = Product::count();
        return view('Admin.admin-product',[
            "Product"  =>     Product::all(),
            "Suppliers"  =>   Suppliers::all(),
            "Categories"  =>  Categories::all(),
            "Attribute"   =>   Attribute::all(),
            "count"   =>   $count
        ]);
    }

    public function supplier() {
        $count = Suppliers::count();
        return view('Admin.dashboard.admin-suppliers',[
            "Suppliers"   =>  Suppliers::all(),
            "count"       =>  $count
        ]);
    }

    public function pengguna() {
        $count = User::count();
        return view('Admin.dashboard.admin-pengguna',[
             "count"   =>   $count,
             "Users"   =>    User::all()
        ]);
    }
}
