<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index() {
        return view('staffGudang.index');
    }
    public function dashboard() {
        return view('staffGudang.dashboard');
    }

    public function stock() {
        return view('staffGudang.stock',[
            'stock' => stock::all()
        ]);
    }

    public function ubahStatus(Request $request, $id)
{
    $barang = stock::findOrFail($id);

    // $allowedStatus = ['diterima', 'ditolak'];

    $statusBaru = $request->input('status');

    // if (!in_array($statusBaru, $allowedStatus)) {
    //     return redirect()->back()->with('error', 'Status tidak valid.');
    // }

    // if ($barang->status !== 'pending') {
    //     return redirect()->back()->with('info', 'Barang sudah diproses.');
    // }

    $barang->status = $statusBaru;
    $barang->save();

    return redirect()->back()->with('success', "Status diubah menjadi " . $statusBaru);
}

}
