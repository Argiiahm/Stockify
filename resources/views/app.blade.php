@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">

      <div class="grid grid-cols-4">
        @foreach ($Products as $p)
            <div class="max-w-sm mx-auto p-4 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700">
                <!-- Gambar -->
                <div class=" mb-4  rounded-lg border border-gray-500 shadow flex items-center justify-center">
                    <img class="w-40 aspect-square object-cover" src="{{ asset('storage/' . $p->image) }}" alt="">
                </div>

                <!-- Judul -->
                <div class="mb-4 text-2xl">{{ $p->name }}</div>

                <!-- Deskripsi -->
                <div class="mb-400 text-l"></div>
                <div class="mb-400 text-l"></div>
                <div class="mb-400 text-l"></div>

                <!-- Avatar dan Info -->
                <div class="flex items-start space-x-4 mb-4">
                    <div class="w-10 h-10 bg-gray-300 rounded-full dark:bg-gray-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2"></div>
                        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 w-40"></div>
                    </div>
                </div>

                {{-- <!-- Rating Tengah -->
                <div class="flex items-center justify-center">
                    <svg class="w-4 h-4 text-yellow-400 me-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927a1 1 0 011.902 0l1.519 4.674h4.916a1 1 0 01.592 1.806l-3.976 2.89
                  1.518 4.674a1 1 0 01-1.538 1.117L10 15.347l-3.981 2.74a1 1 0
                  01-1.538-1.117l1.518-4.674-3.976-2.89a1 1 0
                  01.592-1.806h4.916L9.049 2.927z" />
                    </svg>
                    <svg class="w-4 h-4 text-yellow-400 me-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927a1 1 0 011.902 0l1.519 4.674h4.916a1 1 0 01.592 1.806l-3.976 2.89
                  1.518 4.674a1 1 0 01-1.538 1.117L10 15.347l-3.981 2.74a1 1 0
                  01-1.538-1.117l1.518-4.674-3.976-2.89a1 1 0
                  01.592-1.806h4.916L9.049 2.927z" />
                    </svg>
                    <svg class="w-4 h-4 text-yellow-400 me-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927a1 1 0 011.902 0l1.519 4.674h4.916a1 1 0 01.592 1.806l-3.976 2.89
                  1.518 4.674a1 1 0 01-1.538 1.117L10 15.347l-3.981 2.74a1 1 0
                  01-1.538-1.117l1.518-4.674-3.976-2.89a1 1 0
                  01.592-1.806h4.916L9.049 2.927z" />
                    </svg>

                </div> --}}
            </div>
        @endforeach
      </div>

    </div>
@endsection