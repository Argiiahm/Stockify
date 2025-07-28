<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function store(Request $request)
    {
        $vData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // dd($vData);
        if (Categories::create($vData)) {
            alert()->success('Berhasil! Menambahkan Category');
            return redirect('/admin/produk');
        } else {
            return back();
        }
    }

    public function edit(Categories $category)
    {
        return view('categories.form-edit', [
            "Category"    =>    $category
        ]);
    }

    public function destroy(Categories $category)
    {
        // dd($category);
        $category->delete();
        alert()->success('Berhasil! Menhapus Category');
        return redirect('/admin/produk');
    }

    public function update(Request $request, Categories $category)
    {
        $vData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($category->update($vData)) {
            alert()->success('Berhasil! Mengubah Category');
            return redirect('/admin/produk');
        } else {
            return back();
        }
    }
}
