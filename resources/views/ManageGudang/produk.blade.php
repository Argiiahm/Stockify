@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <h1 class="text-4xl font-bold mb-6 text-gray-800 dark:text-white">Daftar Produk</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($product as $p)
                <a href="/detail_product/m/{{ $p->id }}">
                    <div class="w-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-4 flex items-center justify-center border-b">
                            <img class="aspect-square object-cover rounded-lg" src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}">
                        </div>
                        <div class="px-5 pb-5 pt-4">
                            <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white line-clamp-2">{{ $p->name }}</h5>
                            <p class="text-sm text-gray-500 dark:text-gray-300 mb-2 line-clamp-2">{{ $p->description }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
