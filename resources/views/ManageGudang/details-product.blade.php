@extends('layouts.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <h1>Details Products</h1>
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
    </div>
@endsection
