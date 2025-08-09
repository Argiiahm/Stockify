@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Transaksi Barang Masuk &
                    Keluar</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Transaksi Barang Masuk & Keluar</p>
                <button
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="formtf_masuk" data-modal-toggle="formtf_masuk">
                    <p class="font-medium text-white dark:text-white">Catat Disini</p>
                </button>
            </div>
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Barang Masuk</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lihat Barang Masuk</p>
                <button
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="data_masuk" data-modal-toggle="data_masuk">
                    <p class="font-medium text-white dark:text-white">Tambah</p>
                </button>
            </div>
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Barang Keluar</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lihat Barang Keluar</p>
                <button
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="data_keluar" data-modal-toggle="data_keluar">
                    <p class="font-medium text-white dark:text-white">Tambah</p>
                </button>
            </div>

        </div>


        @include('ManageGudang.forms.add_transaksi_masuk_keluar')
        @include('ManageGudang.modal-barang_masuk')
        @include('ManageGudang.modal-barang_keluar')


        <div class="relative overflow-x-auto">
            <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-2 rounded my-2">
                Stock Opname
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Opname
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
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
                        @if ($hasil <= $p->minimum_stock + 2)
                            <tr class="bg-red-600 text-white border border-b-gray-300">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $p->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $hasil }}
                                </td>
                                @if ($hasil == 0)
                                    <td class="px-6 py-4">
                                        <a href="/stock/detail"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        <a href="/stock/detail/{{ $p->slug }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                    </td>
                                @endif
                            </tr>
                        @else
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $p->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $hasil }}
                                </td>

                                @if ($hasil == 0)
                                    <td class="px-6 py-4">
                                        <a href="/stock/detail"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        <a href="/stock/detail/{{ $p->slug }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
