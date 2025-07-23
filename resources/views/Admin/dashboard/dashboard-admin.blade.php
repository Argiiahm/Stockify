@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="flex items-center gap-3">
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jumlah Produk</h5>
                <p class="mb-3 font-normal text-4xl text-gray-700 dark:text-gray-400">{{ $count }}</p>
            </div>
        </div>
    @endsection
