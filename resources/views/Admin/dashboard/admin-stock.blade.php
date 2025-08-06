@extends('layouts.index')

@section('content')
    <div class="p-6 sm:ml-64">
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
        <div class="relative overflow-x-auto mb-5 mt-5 text-gray-500">
            <h1 class="text-2xl mb-5">Pengaturan Stock Minimum </h1>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sku
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Purchase Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Selling Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Minimum Stok
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $p)
                        <tr class="text-center">
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->sku }}</td>
                            <td>{{ $p->description }}</td>
                            <td>{{ $p->purchase_price }}</td>
                            <td>{{ $p->selling_price }}</td>
                            <td class="py-2 px-3">
                                <img class="w-16" src="{{ asset('storage/' . $p->image) }}" alt="image">
                            </td>
                            <td>
                                <form action="/stock/minimum/{{ $p->id }}" method="POST"
                                    class="flex items-center justify-center space-x-0.5 max-w-xs mx-auto">
                                    @csrf
                                    @method('PUT')

                                    {{-- Tombol (-) --}}
                                    <button type="submit" name="action" value="decrement"
                                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>

                                    {{-- Input manual --}}
                                    <input type="text" name="minimum_stock" min="1" max="50"
                                        value="{{ $p->minimum_stock }}"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 w-12 text-center text-gray-900 text-sm py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none" />
        
                                    {{-- Tombol (+) --}}
                                    <button type="submit" name="action" value="increment"
                                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </form>

                            </td>
                        </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
