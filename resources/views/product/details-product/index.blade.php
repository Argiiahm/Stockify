@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <h1 class="text-4xl">{{ $product->name }} <span class="text-2xl font-normal text-gray-300">in Category
                {{ $product->categories->name }}</span></h1>
        <div class="container px-5 py-8 mx-auto border border-b-gray-200 my-5">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/2 w-96 object-cover object-center rounded border border-gray-200"
                    src="{{ asset('storage/' . $product->image) }}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $product->description }}</h2>
                    <span class="title-font font-medium text-2xl text-gray-600">Rp. {{ $product->selling_price }}</span>
                </div>
            </div>
        </div>
        <h1 class="text-2xl text-gray-400 mb-5">Barang Lainnya</h1>
        <div class="grid grid-cols-1 md:grid-cols-4">
            @foreach ($all as $p)
                <a href="/detail_product/{{ $p->id }}">
                    <div class="p-4 border mb-10 mx-2 rounded-lg bg-white shadow">
                        <div class=" mb-4  rounded-lg border border-black-300 shadow flex items-center justify-center">
                            <img class="aspect-square object-cover" src="{{ asset('storage/' . $p->image) }}"
                                alt="">
                        </div>

                        <div class="text-2xl">{{ $p->name }}</div>

                        <div class="mb-400 text-l text-gray-400">{{ $p->description }}</div>
                        <div class="text-2xl text-gray-500">Rp. {{ $p->selling_price }}</div>
                    </div>
                </a>
                @endforeach
            </div>
            {{-- {{ $all->links('pagination::simple-tailwind') }} --}}
    </div>
@endsection
