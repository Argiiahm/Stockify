@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        {{-- Stock Product by Name --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div class="max-w-sm p-6 bg-blue-700 border border-gray-200 rounded-lg shadow-sm dark:bg-blue-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Jumlah Produk</h5>
                <p class="mb-3 font-normal text-4xl text-white">{{ $count }}</p>
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
        <div class="my-3 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <i class="ph ph-trend-up text-4xl text-gray-600"></i>
                <p class="text-2xl text-gray-400">Data Stok Masuk & Keluar</p>
            </div>
            <form action="/admin/dashboard/search" method="GET">
                @csrf
                <p class="text-gray-400 pb-2">Lihat Berdasarkan Bulan</p>
                <input name="month" type="month" value="{{ Request('month') }}">
                <button class="px-4 py-2 bg-green-500 text-white font-bold rounded-md" type="submit">Cari</button>
            </form>
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
                            backgroundColor: 'rgba(52, 105, 154)',
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
                            backgroundColor: 'rgba(177, 44, 0)',
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
    @endsection
