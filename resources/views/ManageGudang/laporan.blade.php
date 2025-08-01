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
                            <p class="font-bold bg-orange-400 min-w-6 flex justify-center items-center  aspect-square rounded-full">{{ $c->products->count() }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>


        <div class="relative overflow-x-auto my-20">
            <div class="bg-gray-800 text-white px-4 text-2xl font-semibold py-2 rounded my-2">
                Laporan Stock Barang Berdasarkan Priode
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
@endsection
