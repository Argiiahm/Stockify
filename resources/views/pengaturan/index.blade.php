@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">

        {{-- Form Pengaturan --}}
        <div class="max-w-3xl my-20 mx-auto p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Pengaturan Aplikasi</h2>

            <form action="/pengaturan/update/{{ $p->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama Aplikasi --}}
                <div class="mb-4">
                    <label for="app_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                        Aplikasi</label>
                    <input type="text" name="app_name" id="app_name" value="{{ old('app_name', $p->app_name ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>

                {{-- Logo --}}
                <div class="mb-4">
                    <label for="logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Logo saat
                        ini</label>
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $p->app_image) }}" alt="Logo" class="w-32 h-32">
                        <input type="file" name="app_image" id="logo" value="{{ asset($p->app_image) }}"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0 file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100  dark:file:text-white dark:hover:file:bg-gray-600">
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
