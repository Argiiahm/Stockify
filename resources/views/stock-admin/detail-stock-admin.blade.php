@extends('layouts.index')
@section('content')
    <div class="p-6 sm:ml-64">
        <div class="grid grid-cols-2">
             {{-- <div class="bg-red-100">1</div>
             <div class="">2</div> --}}
        </div>
        <div class="relative overflow-x-auto">
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
