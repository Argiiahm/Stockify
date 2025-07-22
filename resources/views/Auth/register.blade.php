<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body>
    <!-- component -->
    <div class="max-w-screen-lg mx-auto mt-40 p-6 bg-gray-100 flex items-center justify-center">
        <div class="container m ax-w-screen-lg mx-auto">
            <div>
                <h2 class="font-semibold text-xl text-gray-600">Buat Akun</h2>
                <p class="text-gray-500 mb-6">Top Up Games DLL Terpercaya.</p>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Welcome Stokify</p>
                            <p>Ayo Daftar Sekarang!</p>
                        </div>
                        <div class="lg:col-span-2">
                            <form action="/buatAkun" method="POST">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label for="name">Name</label>
                                          @error('name')
                                           <p class="text-red-800">{{ $message }}</p>
                                         @enderror
                                        <input type="text" name="name" id="name"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="email">Email Address*</label>
                                         @error('email')
                                           <p class="text-red-800">{{ $message }}</p>
                                         @enderror
                                        <input type="text" name="email" id="email"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                            placeholder="email@domain.com" />
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="password">Password*</label>
                                         @error('password')
                                           <p class="text-red-800">{{ $message }}</p>
                                         @enderror
                                        <input type="password" name="password" id="password"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="password">Konfirmasi Password*</label>
                                         @error('password')
                                           <p class="text-red-800">{{ $message }}</p>
                                         @enderror
                                        <input type="password" name="password" id="password"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                    </div>
                                    <div class="md:col-span-5 text-right">
                                        <div class="flex items-center justify-between">
                                            <p>Sudah Punya Akun? <a class="text-blue-500 font-bold" href="/login">Login</a> Disini!</p>
                                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
