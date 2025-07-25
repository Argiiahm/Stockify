@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="flex items-center gap-3">
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jumlah Produk</h5>
                <p class="mb-3 font-normal text-4xl text-gray-700 dark:text-gray-400">{{ $count }}</p>
            </div>
        </div>

        <div>
            @include('product.table-product')
            <section>
                <canvas id="stockchart"></canvas>
            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('stockchart');

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
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Stock Keluar',
                            data: [
                                @foreach ($stokKeluar as $value)
                                    {{ $value }},
                                @endforeach
                            ],
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
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
