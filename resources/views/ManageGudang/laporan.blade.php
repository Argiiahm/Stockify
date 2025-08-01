@extends('layouts.index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div>
            <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-2 rounded my-2">
                Laporan Stock Barang Berdasarkan Category
            </div>
            <div class="grid grid-cols-4  gap-2 my-3">

                @foreach ($category as $c)
                    <a class="bg-green-400 px-5 py-2 rounded-md text-white font-bold hover:opacity-80 transition duration-300 ease-in-out"
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


        <div class="relative overflow-x-auto mt-20">
            <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-2 rounded my-2">
                Laporan Stock Barang Berdasarkan Priode
            </div>
            <div class="flex items-center justify-between">
                <h1 class="text-2xl text-gray-500 font-bold">
                    Bulan:
                    {{ ['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'][explode('-', request('month') ?? date('Y-m'))[1]] }}
                </h1>
                <form action="/laporan/priode/stock" method="GET">
                    @csrf
                    <input name="month" type="month" value="{{ Request('month') }}"
                        class="mb-2 p-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <button class="px-4 py-2 bg-green-500 text-white font-bold rounded-md" type="submit">Cari</button>
                </form>

            </div>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Priode
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Name
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($DataStock as $d)
                    @php

                        $now = now()->format('Y-m');

                        $stokM = $d->stock
                            ->where('type', 'masuk')
                            ->where('status', 'diterima')
                            ->filter(function ($item) use ($now) {
                                return $item->created_at->format('Y-m') === $now;
                            })
                            ->sum('quantity');

                        $stokK = $d->stock
                            ->where('type', 'keluar')
                            ->where('status', 'dikeluarkan')
                            ->filter(function ($item) use ($now) {
                                return $item->created_at->format('Y-m') === $now;
                            })
                            ->sum('quantity');

                        $output = $stokM - $stokK;
                    @endphp

                    <tr>
                        <td class="px-6 py-3">{{ $d->created_at->format('y-m-d') }}</td>
                        <td class="px-6 py-3">{{ $d->name }}</td>
                        <td class="px-6 py-3">{{ $output }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    </div>
@endsection
