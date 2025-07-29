<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    public function index()
    {
        return view('staffGudang.index');
    }


    public function dashboard()

    {

        return view('staffGudang.dashboard', [
            'stock' => stock::all()
        ]);
    }

    public function stock()
    {

        return view('staffGudang.stock', [
            'stock' => stock::all()
        ]);
    }

    public function ubahStatus(Request $request, $id)
    {
        $barang = stock::findOrFail($id);
        $statusBaru = $request->input('status');
        $barang->status = $statusBaru;
        $barang->save();

        alert()->success('Berhasil!', 'Status diubah menjadi ' . $statusBaru);
        return back();
    }
    //hapus stock
    public function hapusstock(Stock $stock)
    {
        $stock->delete();
        alert()->success('SuccessAlert', 'Barang Berhasil Ditolak!');
        return back();
    }


    // Stock return
    public function returnstock(Request $request, $id)
    {
        $barang = stock::findOrFail($id);

        $typebaru = $request->input('type');


        $barang->type = $typebaru;
        $barang->save();

        alert()->success('Berhasil!');
        return back();
    }


    //Stock Keluar
    public function keluarstock(Request $request, $id)
    {
        $barang = stock::findOrFail($id);

        $statusBaru = $request->input('status');
        $barang->status = $statusBaru;
        $barang->save();

        alert()->success('Berhasil!', 'Status diubah menjadi ' . $statusBaru);
        return back();
    }


    //detail products
    public function detailStock(Stock $stock)
    {
        $riwayat = Stock::where('product_id', $stock->product_id)
            ->whereIn('status', ['diterima', 'dikeluarkan'])
            ->orderBy('date', 'desc')
            ->get();

        return view('stock-admin.detail-stock-admin', [
            "stock"  => $riwayat
        ]);
    }
}
