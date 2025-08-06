@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="flex items-center gap-3">
                  <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kelola Suppliers</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kelola Suppliers</p>

                <button
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="suppliers-modal" data-modm al-toggle="suppliers-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Add Suppliers
                </button>
            </div>
            <div class="flex items-center gap-3">
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Suppliers</h5>
                <p class="mb-3 font-normal text-4xl text-gray-700 dark:text-gray-400">{{ $count }}</p>
            </div>
        </div>
        </div>

        @include('suppliers.table-suppliers')

    </div>


    @include('suppliers.form-add_suppliers')
@endsection
