<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('Auth.login');
    }

    public function masuk(Request $request) {
        // dd($request->all());
        $vd = $request->validate([
           "email"    =>    "required|email",
           "password" =>    "required"
        ]);

        // dd(Auth::attempt($vd));

        if(Auth::attempt($vd)) {
            return redirect('/');
        }else {
            return back();
        }
    }

    public function register() {
        return view('Auth.register');
    }

    // public function daftar(Request $request) {
    //     $vData = $request->validate([
    //         "username"   =>  
    //     ])
    // }

}
