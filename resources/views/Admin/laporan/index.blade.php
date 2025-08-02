@extends('layouts.index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div>
            <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-2 rounded my-2">
                Laporan Stock Barang Berdasarkan Category
            </div>
            <div class="grid grid-cols-2  gap-2 my-3">

                @foreach ($category as $c)
                    <a class="bg-green-400 px-5 py-7 rounded-md text-white font-bold hover:opacity-80 transition duration-300 ease-in-out"
                        href="/laporan/stock/m/{{ $c->name }}">
                        <div class="flex justify-between items-center">
                            <p>{{ $c->name }}</p>
                            <p
                                class="font-bold bg-orange-400 min-w-6 flex justify-center items-center  aspect-square rounded-full">
                                {{ $c->products->count() }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        @php
            $bulanUnik = [];

            foreach ($DataStock as $d) {
                foreach ($d->stock as $s) {
                    $bulan = date('Y-m', strtotime($s->created_at));
                    $bulanUnik[$bulan] = date('F Y', strtotime($s->created_at));
                }
            }

            krsort($bulanUnik);
        @endphp

        @foreach ($bulanUnik as $kodeBulan => $namaBulan)
            <h2 class="text-xl font-bold mt-10 mb-4">Laporan Bulan {{ $namaBulan }}</h2>

            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-10">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama Produk</th>
                            <th scope="col" class="px-6 py-3">Stok Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($DataStock as $d)
                            @php
                                $stokM = $d->stock
                                    ->where('type', 'masuk')
                                    ->where('status', 'diterima')
                                    ->filter(function ($item) use ($kodeBulan) {
                                        return date('Y-m', strtotime($item->created_at)) === $kodeBulan;
                                    })
                                    ->sum('quantity');

                                $stokK = $d->stock
                                    ->where('type', 'keluar')
                                    ->where('status', 'dikeluarkan')
                                    ->filter(function ($item) use ($kodeBulan) {
                                        return date('Y-m', strtotime($item->created_at)) === $kodeBulan;
                                    })
                                    ->sum('quantity');

                                $output = $stokM - $stokK;
                            @endphp

                            @if ($output != 0)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-3">{{ $d->name }}</td>
                                    <td class="px-6 py-3">{{ $output }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach

        <div class="relative overflow-x-auto my-10">
            <div class="bg-gray-800 text-white px-4 text-2xl font-semibold py-2 rounded my-2">
                Laporan Barang Masuk
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
            <div class="bg-gray-800 text-white px-4 text-2xl font-semibold py-2 rounded my-2">
                Laporan Barang Keluar
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


        <div class="relative overflow-x-auto my-12">
            <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-3 rounded my-2">
                <div class="flex justify-between items-center px-10 pb-4">
                    Laporan Aktivitas User
                    <h1 class="my-2 text-gray-400">All</h1>
                </div>

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aktivity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Time
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actv as $a)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $a->user->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $a->user->role }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $a->action }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $a->activity }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $a->created_at->format('d F Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $a->created_at->format('H:i:s') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
