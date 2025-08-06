<?php

namespace App\Http\Controllers;

use App\Models\Property_app;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PropertyAppController extends Controller
{
    public function index()
    {
        $p = Property_app::first();
        return view('pengaturan.index', [
            "p" =>  $p
        ]);
    }


    public function update(Request $request, Property_app $property_app)
    {
        $Vdata = $request->validate([
            'app_name' => 'required|max:20',
            'app_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif',
        ]);

        if ($request->hasFile('app_image')) {
            if ($property_app->app_image && Storage::disk('public')->exists($property_app->app_image)) {
                Storage::disk('public')->delete($property_app->app_image);
            }
            $Vdata['app_image'] = $request->file('app_image')->store('product-image', 'public');
        } else {
            unset($Vdata['app_image']);
        }

        $property_app->update($Vdata);

        return redirect('/admin/pengaturan')->with('success', 'Data berhasil diperbarui!');
    }
}
