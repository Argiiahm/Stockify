<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    //
    public function store(Request $request){
        $vdata = $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'value' => 'required',
        ]); 
        if(Attribute::create($vdata)){
            return redirect('/admin/produk/');
        }else{
            return back();
        }
       }

       public function destroy(Attribute $attribute){
        if($attribute->delete()){
            return redirect('/admin/produk');
        }else{
            return back();
        }
       }

       public function edit(Attribute $attribute){
        return view('atribut.form-edit',[
            'attribute' => $attribute
        ]);
       }

       public function update(Request $request, Attribute $attribute){
        $vdata = $request->validate([
            'name' => 'required',
            'value' => 'required',
        ]);
        if($attribute->update($vdata)){
            return redirect('/admin/produk');
        }else{
            return back();
        }
           }
}
