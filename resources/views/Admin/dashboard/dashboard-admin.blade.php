@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        {{-- Stock Product by Name --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="max-w-sm p-6 flex items-center justify-between border border-gray-200 rounded-lg bg-gray-100 shadow">
                <div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-zinc-700">Jumlah Produk</h5>
                    <p class="mb-3 font-normal text-4xl text-zinc-600">{{ $count }}</p>
                </div>
                <div class="w-24">
                    <img src="{{ asset('image/tl.webp') }}" alt="">
                </div>
            </div>
            @foreach ($Product as $s)
                @php
                    $stokM = $s->stock->where('type', 'masuk')->where('status', 'diterima')->sum('quantity');
                    $stokK = $s->stock->where('type', 'keluar')->where('status', 'dikeluarkan')->sum('quantity');

                    $output = $stokM - $stokK;
                @endphp
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $s->name }}
                        <p class="font-normal text-gray-500">Daftar Stock</p>
                    </h5>
                    <p class="mb-3 font-normal text-4xl text-gray-700 dark:text-gray-400">{{ $output }}</p>
                </div>
            @endforeach
        </div>

        {{-- Filter Berdasarkan Bulan --}}
        <div class="my-5 block lg:flex justify-between items-center">
            <div class="flex items-center gap-2">
                <i class="ph ph-trend-up text-4xl text-gray-600"></i>
                <p class="text-2xl text-gray-400">Data Stok Masuk & Keluar</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-md shadow-md">
                <form action="/admin/dashboard/search" method="GET">
                    @csrf
                    <p class="text-gray-300 pb-2">Lihat Berdasarkan Bulan</p>
                    <input name="month" type="month" value="{{ Request('month') }}"
                        class="mb-2 p-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <button class="px-4 py-2 bg-green-500 text-white font-bold rounded-md" type="submit">Cari</button>
                </form>
            </div>
        </div>
        <h1 class="font-bold text-gray-500">
            Bulan:
            {{ ['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'][explode('-', request('month') ?? date('Y-m'))[1]] }}
        </h1>

        <div>
            <section>
                <canvas id="laporan"></canvas>
            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('laporan');

            const stockchart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach ($Product as $p)
                            '{{ $p->name }}',
                        @endforeach
                    ],
                    datasets: [{
                            label: 'Stock Masuk',
                            data: [
                                @foreach ($stokMasuk as $value)
                                    {{ $value }},
                                @endforeach
                            ],
                            backgroundColor: 'rgba(121, 158, 255)',
                            borderColor: 'rgba(173, 238, 217)',
                            borderWidth: 1
                        },
                        {
                            label: 'Stock Keluar',
                            data: [
                                @foreach ($stokKeluar as $value)
                                    {{ $value }},
                                @endforeach
                            ],
                            backgroundColor: 'rgba(239, 90, 111)',
                            borderColor: 'rgba(237, 53, 0)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            ticks: {
                                maxRotation: 45,
                                minRotation: 0
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>


        <div class="relative overflow-x-auto my-12">
            <div class="bg-gray-800 text-white text-center font-semibold py-1 rounded my-2">
                <div class="flex justify-between items-center px-10 pb-4">
                    Tabel Aktivitas User
                    <h1 class="my-2 text-gray-400"> {{ now()->translatedformat('l') }}</h1>
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
                        @foreach ($Activity as $a)
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
            {{-- {{ $Activity->links('pagination::simple-tailwind') }} --}}
        </div>
    @endsection
