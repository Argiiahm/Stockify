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
                    <p class="font-medium text-white dark:text-white">Lihat Disini</p>
                </button>
            </div>

        </div>


        @include('ManageGudang.forms.add_transaksi_masuk_keluar')
        @include('ManageGudang.modal-barang_masuk')
        @include('ManageGudang.modal-barang_keluar')

         <div class="relative overflow-x-auto my-5">
     <h1 class="text-2xl my-3">Data Product</h1>
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
                     stock
                 </th>
             </tr>
         </thead>
         <tbody>
            @foreach ($Product as $p )
               <tr class="text-center">
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->sku }}</td>
                    <td>{{ $p->description }}</td>
                    <td>{{ $p->purchase_price }}</td>
                    <td>{{ $p->selling_price }}</td>
                    <td class="py-2 px-3">
                        <img class="w-16" src="{{ asset('storage/' . $p->image) }}" alt="image">
                    </td>
            @php
                $stokM = $p->stock->where('type', 'masuk')->where('status', 'diterima')->sum('quantity');
                $stokK = $p->stock->where('type', 'keluar')->where('status', 'dikeluarkan')->sum('quantity');

                $output = $stokM - $stokK;
            @endphp
                    <td>{{ $output }}</td>
               </tr>
            @endforeach
         </tbody>
     </table>
 </div>

    </div>
@endsection
