<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function masuk(Request $request)
    {
        // dd($request->all());
        $vd = $request->validate([
            "email"    =>    "required|email",
            "password" =>    "required"
        ]);

        // dd(Auth::attempt($vd));

        Auth::attempt($vd);
        return redirect('/');

        // if (Auth::attempt($vd)) {
        //     if (Auth::user()->role == "Admin") {
        //         return redirect('/admin/dashboard');
        //     } elseif (Auth::user()->role == "Manajer gudang") {
        //         return redirect('/management_gudang/dashboard');
        //     }elseif(Auth::user()->role == "Staff gudang") {
        //         return redirect('/staffgudang/dashboard');
        //     }
        // }
    }


    public function store(Request $request)
    {
        $vd = $request->validate([
            "name"      =>    "required",
            "email"     =>    "required|email",
            "password"  =>    "required",
            "role"      =>    "in:Admin,Staff gudang,Manajer gudang"
        ]);

        $vd['password']  = bcrypt($request->password);

        // dd($vd);

        if (User::create($vd)) {
            alert()->success('Berhasil! Menambahkan Pengguna');
            return redirect('/admin/pengguna');
        } else {
            return back();
        }
    }

    public function edit(User $pengguna)
    {
        return view('pengguna.form-edit_pengguna', [
            'user' => $pengguna
        ]);
    }


    public function update(Request $request, User $pengguna)
    {
        $vd = $request->validate([
            "name"      =>    "required",
            "email"     =>    "required|email",
            "role"      =>    "in:Admin,Staff gudang,Manajer gudang"
        ]);

        if ($pengguna->update($vd)) {
            alert()->success('Berhasil! Mengubah Pengguna');
            return redirect('/admin/pengguna');
        } else {
            return back();
        }
    }

    public function delete(User $pengguna)
    {
        if ($pengguna->delete()) {
            alert()->success('Berhasil! Menghapus Pengguna');
            return redirect('/admin/pengguna');
        } else {
            return back();
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
