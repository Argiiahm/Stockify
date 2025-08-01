@extends('layouts.index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="relative overflow-x-auto mt-5">
            <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-2 rounded my-2">
                Data Suppliers
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Suppliers as $s)
                        <tr class="">
                            <td class="py-4">{{ ($s->name) }}</td>
                            <td>{{ ($s->address) }}</td>
                            <td>{{ Str::limit(Str::mask($s->phone, '*', 10), 20) }}</td>
                            <td>{{ Str::limit(Str::mask($s->email, '*', 9), 7) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
    </div>
    @endsection
