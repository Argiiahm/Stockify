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
        <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-2 rounded my-2">{{ $namaBulan }}
                
            </div>
        
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
    </div>
@endsection
