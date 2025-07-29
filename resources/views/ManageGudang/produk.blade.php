@extends('layouts.index')
@section('content')
    <div class="p-4 sm:ml-64">
         <h1 class="text-4xl">Daftar Product</h1>
        <div class="grid grid-cols-1 md:grid-cols-4 my-5">
            @foreach ($product as $p)
                <a href="/detail_product/m/{{ $p->id }}">
                    <div class="p-4 border mb-10 mx-2 rounded-lg bg-white shadow">
                        <div class=" mb-4  rounded-lg border border-black-300 shadow flex items-center justify-center">
                            <img class="aspect-square object-cover" src="{{ asset('storage/' . $p->image) }}" alt="">
                        </div>

                        <div class="text-2xl">{{ $p->name }}</div>

                        <div class="mb-400 text-l text-gray-400">{{ $p->description }}</div>
                        <div class="text-2xl text-gray-500">Rp. {{ $p->selling_price }}</div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
@endsection
