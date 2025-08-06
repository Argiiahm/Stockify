<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<title>Stockify</title>
<link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" /> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<body class="bg-[#FAF7F3]">
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800">
            <ul class="space-y-2 font-medium">

                {{-- Logo --}}
                @php
                    $imagePath = $property_app->app_image;
                @endphp

                <li class="flex justify-center my-10">
                    <div class=" w-32 p-2 flex items-center justify-center">
                        <img class="" src="{{ Str::startsWith($imagePath, 'image/') ? asset($imagePath) : asset('storage/' . $imagePath) }}"
                            alt="Logo" class="h-full object-contain">
                    </div>
                </li>
                {{-- Admin Route --}}
                @if (Auth::user()->role == 'Admin')
                    <li>
                        <button type="button"
                            class="flex items-center bg-gray-700 w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-gray-600"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">

                            <i class="ph ph-identification-card text-white"></i>

                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Admin</span>

                            <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>


                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                            <li>
                                <a href="/admin/dashboard"
                                    class="flex {{ Request()->is('admin/dashboard') ? 'bg-gray-700' : '' }} items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Dashboard</a>
                            </li>
                            <li>
                                <a href="/admin/produk"
                                    class="flex {{ Request()->is('admin/produk') ? 'bg-gray-700' : '' }} items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Produk</a>
                            </li>
                            <li>
                                <a href="/admin/stock"
                                    class="flex {{ Request()->is('admin/stock') ? 'bg-gray-700' : '' }} items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Stok</a>
                            </li>
                            <li>
                                <a href="/admin/supplier"
                                    class="flex items-center {{ Request()->is('admin/supplier') ? 'bg-gray-700' : '' }} w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Supplier</a>
                            </li>
                            <li>
                                <a href="/admin/pengguna"
                                    class="flex items-center {{ Request()->is('admin/pengguna') ? 'bg-gray-700' : '' }} w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Pengguna</a>
                            </li>
                            <li>
                                <a href="/admin/laporan"
                                    class="flex items-center {{ Request()->is('admin/laporan') ? 'bg-gray-700' : '' }} w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Laporan</a>
                            </li>
                            <li>
                                <a href="/admin/pengaturan"
                                    class="flex items-center {{ Request()->is('admin/pengaturan') ? 'bg-gray-700' : '' }} w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Pengaturan</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li onclick="return alert('Anda Tidak Punya Akses')"
                        class="flex cursor-pointer  justify-between items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <button class="flex items-center">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Admin</span>
                        </button>
                        <i class="ph ph-lock-key"></i>
                    </li>
                @endif
                </li>
                {{-- End Admin Route --}}

                {{-- Manajer Route --}}
                @if (Auth::user()->role == 'Manajer gudang' || Auth::user()->role == 'Admin')
                    <li>
                        <button type="button"
                            class="flex items-center bg-gray-700 w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-gray-600"
                            aria-controls="dropdown-m" data-collapse-toggle="dropdown-m">

                            <i class="ph ph-warehouse text-white"></i>

                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Management
                                Gudang</span>

                            <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>



                        <ul id="dropdown-m" class="hidden py-2 space-y-2">
                            <li>
                                <a href="/management_gudang/dashboard"
                                    class="flex {{ Request()->is('management_gudang/dashboard') ? 'bg-gray-700' : '' }} items-center w-full p-2 text-gray-400 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Dashboard</a>
                            </li>
                            <li>
                                <a href="/management_gudang/produk"
                                    class="flex {{ Request()->is('management_gudang/produk') ? 'bg-gray-700' : '' }} items-center w-full p-2 text-gray-400 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Produk</a>
                            </li>
                            <li>
                                <a href="/management_gudang/stock"
                                    class="flex {{ Request()->is('management_gudang/stock') ? 'bg-gray-700' : '' }} items-center w-full p-2 text-gray-400 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Stok</a>
                            </li>
                            <li>
                                <a href="/management_gudang/supplier"
                                    class="flex {{ Request()->is('management_gudang/supplier') ? 'bg-gray-700' : '' }} items-center w-full p-2 text-gray-400 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Supplier</a>
                            </li>
                            <li>
                                <a href="/management_gudang/laporan"
                                    class="flex items-center w-full {{ Request()->is('management_gudang/laporan') ? 'bg-gray-700' : '' }} p-2 text-gray-400 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Laporan</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li onclick="return alert('Anda Tidak Punya Akses')"
                        class="flex cursor-pointer  justify-between items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <button class="flex items-center">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">manajer gudang</span>
                        </button>
                        <i class="ph ph-lock-key"></i>
                    </li>
                @endif
                {{-- End Manajer Route --}}

                {{-- Staff Gudang Route --}}
                <li>
                    <button type="button"
                        class="flex items-center bg-gray-700 w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-gray-600"
                        aria-controls="dropdown-staff" data-collapse-toggle="dropdown-staff">

                        <i class="ph ph-identification-card text-white"></i>

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Staff Gudang</span>

                        <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <ul id="dropdown-staff" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/staffgudang/dashboard"
                                class="flex {{ Request()->is('staffgudang/dashboard') ? 'bg-gray-700' : '' }} items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 text-gray-400">Dashboard</a>
                        </li>
                        <li>
                            <a href="/staffgudang/stock"
                                class="flex items-center {{ Request()->is('staffgudang/stock') ? 'bg-gray-700' : '' }}  w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 text-gray-400">Stok</a>
                        </li>
                    </ul>
                </li>
                <li class="block lg:hidden md:hidden">
                    <p class="font-semibold md:block whitespace-nowrap text-zinc-500">
                        {{ Auth::user()->name }}</p>
                </li>
                <li class="block lg:hidden md:hidden">
                    @if (Auth::check())
                        <form action="/logout" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="flex items-center p-2 text-gray-900 rounded-lg bg-green-600 dark:text-white">
                                <svg class="shrink-0 w-5 h-5 text-white transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 18 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                                </svg>
                                <span
                                    class="flex-1 ms-3 whitespace-nowrap dark:text-white text-gray-200 font-bold">Keluar</span>
                            </button>
                        </form>
                    @else
                        <a href="/login" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 18 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Masuk</span>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </aside>
    <div class="p-4 sm:ml-64">
        <nav class="border-gray-200 rounded-md  shadow-md bg-gray-800 dark:border-gray-700">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap text-white flex items-center gap-3">
                    @if (Auth::user()->role == 'Admin')
                        {{ $property_app->app_name }}<span
                            class="tracking-wider flex gap-2 items-center text-white bg-blue-500 px-4 py-1 text-sm rounded leading-loose mx-2 font-semibold"
                            title="">
                            <i class="fas fa-star" aria-hidden="true"></i>{{ Auth::user()->role }}</span>
                    @elseif (Auth::user()->role == 'Manajer gudang')
                        <span
                            class="tracking-wider flex items-center gap-2 text-white bg-orange-500 px-4 py-1 text-sm rounded leading-loose mx-2 font-semibold"
                            title="">
                            <i class="fas fa-heart" aria-hidden="true"></i>{{ Auth::user()->role }}
                        </span>
                    @elseif (Auth::user()->role == 'Staff gudang')
                        <span
                            class="tracking-wider text-white bg-green-500 flex items-center gap-2 px-4 py-1 text-sm rounded leading-loose mx-2 font-semibold"
                            title="">
                            <i class="fas fa-award" aria-hidden="true"></i>{{ Auth::user()->role }}
                        </span>
                    @endif
                </span>
                <div class="flex items-center gap-5">
                    <p class="font-semibold hidden lg:block md:block whitespace-nowrap text-white">
                        {{ Auth::user()->name }}</p>
                    @if (Auth::check())
                        <div class="hidden lg:block md:block">
                            <form action="/logout" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="flex items-center p-2 text-gray-900 rounded-lg bg-green-600 dark:text-white">
                                    <svg class="shrink-0 w-5 h-5 text-white transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 18 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                                    </svg>
                                    <span
                                        class="flex-1 ms-3 whitespace-nowrap dark:text-white text-gray-200 font-bold">Keluar</span>
                                </button>
                            </form>
                        @else
                            <a href="/login" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white">
                                <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 18 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Masuk</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </div>
    @yield('content')

    @include('sweetalert::alert')

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
