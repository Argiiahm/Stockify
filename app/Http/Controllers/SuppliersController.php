<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $vData = $request->validate([
            "name"     =>     "required",
            "address"  =>     "required",
            "phone"    =>     "required",
            "email"    =>     "required|email"
        ]);

        if (Suppliers::create($vData)) {
            alert()->success('successAlert', 'Suppliers DiTambahkan!');
            return redirect('/admin/supplier');
        } else {
            return back();
            alert()->success('successAlert', 'Suppliers Gagal DiTambahkan!');
        }
    }


    public function destroy(Suppliers $suppliers)
    {
        $suppliers->delete();
        alert()->success('successAlert', 'Suppliers Dihapus!');
        return redirect('/admin/supplier');
    }

    public function edit(Suppliers $suppliers)
    {
        return view('suppliers.form-edit', [
            'suppliers' => $suppliers
        ]);
    }

    public function update(Request $request, Suppliers $suppliers)
    {
        $vData = $request->validate([
            "name"     =>     "required",
            "address"  =>     "required",
            "phone"    =>     "required",
            "email"    =>     "required|email"
        ]);

        if ($suppliers->update($vData)) {
            alert()->success('successAlert', 'Suppliers Diubah!');
            return redirect('/admin/supplier');
        } else {
            return back();
            alert()->success('warningAlert', 'Gagal Diubah!');
        }
    }
}
