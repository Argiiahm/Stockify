<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function store(Request $request) {
        // dd($request->all());
        $vData = $request->validate([
            "name"     =>     "required",
            "address"  =>     "required",
            "phone"    =>     "required",
            "email"    =>     "required|email"
        ]);

        if(Suppliers::create($vData)) {
            return redirect('/admin/supplier');    
        }else {
            return back();
        }
    }


    public function destroy(Suppliers $suppliers) {
        $suppliers->delete();
        return redirect('/admin/supplier');
    }

    public function edit(Suppliers $suppliers) {
        return view('suppliers.form-edit',[
            'suppliers' => $suppliers
        ]);
    }

    public function update(Request $request, Suppliers $suppliers) {
        $vData = $request->validate([
            "name"     =>     "required",
            "address"  =>     "required",
            "phone"    =>     "required",
            "email"    =>     "required|email"
        ]);

        if($suppliers->update($vData)) {
            return redirect('/admin/supplier');    
        }else {
            return back();
        }
    }
}