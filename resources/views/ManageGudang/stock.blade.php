@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="grid grid-cols-3 gap-3">
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Barang Masuk</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Barang Masuk</p>
                <button
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="formtf_masuk" data-modal-toggle="formtf_masuk">
                    <p class="font-medium text-white dark:text-white">Add barang</p>
                </button>
            </div>
             <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Barang Keluar</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Barang Keluar</p>
                <button
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="formtf_keluar" data-modal-toggle="formtf_keluar">
                    <p class="font-medium text-white dark:text-white">Add barang</p>
                </button> 
            </div>
            
        </div>


        @include('product.form-add_product')
        @include('ManageGudang.forms.add_transaksi_masuk')
        @include('ManageGudang.forms.add_transaksi_keluar')

        
        {{-- Table Produk --}}
        @include('product.table-product')



    </div>
@endsection
