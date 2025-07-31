@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">

        <div class="relative overflow-x-auto my-20">
            <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-3 rounded my-2 ">
                Daftar Stock Menipis
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Barang Menipis
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $p)
                        @php
                            $stokM = $p->stock->where('type', 'masuk')->where('status', 'diterima')->sum('quantity');
                            $stokK = $p->stock
                                ->where('type', 'keluar')
                                ->where('status', 'dikeluarkan')
                                ->sum('quantity');
                            $hasil = $stokM - $stokK;
                        @endphp
                        @if ($hasil <= $p->minimum_stock + 5)
                            <tr class="bg-red-600 text-white border border-b-gray-300">
                                <td class="px-6 py-4">
                                    {{ $p->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $hasil }}
                                </td>
                            </tr>
                        @else
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- table barang masuk --}}
        <div class="relative overflow-x-auto my-10">
            <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-3 rounded my-2">
                Barang Masuk
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            tanggal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stockMasuk as $p)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $p->product->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $p->quantity }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $p->created_at->format('d-m-Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Table Barang Keluar --}}
        <div class="relative overflow-x-auto">
            <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-3 rounded my-2">
                Barang Keluar
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            tanggal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stockKeluar as $p)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $p->product->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $p->quantity }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $p->created_at->format('d-m-Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
