@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="flex items-center gap-3">
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kelola Produk</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kelola Produk</p>
                <button
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="static-modal" data-modal-toggle="static-modal">
                    <p class="font-medium text-white dark:text-white">Add Product</p>
                </button> 
          
            </div>
            
            
            {{-- Modal Btn Category --}}
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kelola Category</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kelola Category</p>

                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Add Category
                </button>
            </div>
            {{-- End Modal Btn Category --}}
            
            {{-- Modal Btn Add Suppliers --}}
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kelola Suppliers</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kelola Suppliers</p>

                <button
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="suppliers-modal" data-modal-toggle="suppliers-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Add Suppliers
                </button>
            </div>
            {{-- End Modal Btn Add Suppliers --}}

            {{-- Modal Btn Add Pengguna --}}
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kelola Pengguna</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kelola Pengguna</p>

                <button
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="pengguna-modal" data-modal-toggle="pengguna-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Add Pengguna
                </button>
            </div>
            {{-- End Modal Btn Add Pengguna --}}

            
            {{-- <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kelola Transaksi</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kelola Transaksi</p>

                <button
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="pengguna-modal" data-modal-toggle="pengguna-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Add Transaksi
                </button>
            </div> --}}


            @include('categories.form-add_category')
            @include('product.form-add_product')
            @include('suppliers.form-add_suppliers') 
            @include('pengguna.form-add_pengguna')
            {{-- @include('pengguna.form-add_transaksi')  --}}
        </div>

        @include('product.table-product')
        <div class="flex gap-5">
            @include('categories.table-categories')
            @include('suppliers.table-suppliers')
        </div>

    </div>
@endsection
