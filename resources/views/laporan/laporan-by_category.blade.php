@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                            Categories
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                            Stock
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

                            $output = $stokM - $stokK;
                        @endphp
                        <tr class="bg-white dark:bg-gray-800">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $p->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $output }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
