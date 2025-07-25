@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="grid grid-cols-3">
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Barang Masuk</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lihat Barang Masuk</p>
                <button
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="data_masuk" data-modal-toggle="data_masuk">
                    <p class="font-medium text-white dark:text-white">Lihat Disini</p>
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
    </div>



    {{-- @include('ManageGudang.modal-barang_masuk')
    @include('ManageGudang.modal-barang_keluar') --}}
@endsection
