@extends('layouts.index')
@section('content')
    <div class="p-6 sm:ml-64">
        <div class="grid grid-cols-10">
            <a href="/admin/stock"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</a>
        </div>
        <div class="relative overflow-x-auto">
            <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-3 rounded my-2">
                Riwayat Transaksi
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        {{-- <th scope="col" class="px-6 py-3"> 
                            No
                        </th> --}}
                        <th scope="col" class="px-6 py-3">
                            Nama Barang
                        </th>

                        <th scope="col" class="px-6 py-3">
                            type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah
                        </th>
                        <th scope="col" class="px-6 py-3">
                            tanggal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stock as $m)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4">
                                {{ $m->product->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $m->type }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $m->quantity }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $m->date }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
