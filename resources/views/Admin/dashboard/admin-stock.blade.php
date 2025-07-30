@extends('layouts.index')

@section('content')
    <div class="p-6 sm:ml-64">
        <div class="relative overflow-x-auto">
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
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $p->name }}
                            </td>

                            @php
                                $stokM = $p->stock
                                    ->where('type', 'masuk')
                                    ->where('status', 'diterima')
                                    ->sum('quantity');
                                $stokK = $p->stock
                                    ->where('type', 'keluar')
                                    ->where('status', 'dikeluarkan')
                                    ->sum('quantity');

                                $hasil = $stokM - $stokK;
                            @endphp


                            <td class="px-6 py-4">
                                {{ $hasil  }}
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
