<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stockify</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body>
    <div class="max-w-screen-lg mx-auto mt-40 p-6 bg-gray-100 flex items-center justify-center">
        <div class="container m ax-w-screen-lg mx-auto">
            <div>
                <h2 class="font-semibold text-xl text-gray-600">Edit Categories</h2>
                <p class="text-gray-500 mb-6">Stockify</p>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="lg:col-span-2">
                            <form action="/suppliers/update/{{ $suppliers->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label for="email">Name</label>
                                        @error('name')
                                            <p class="text-red-800">{{ $message }}</p>
                                        @enderror
                                        <input type="text" name="name" id="name" value="{{old('name', $suppliers->name)}}"
                                            value=""
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                            placeholder="Name" />
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="address">Address</label>
                                        @error('address')
                                            <p class="text-red-800">{{ $message }}</p>
                                        @enderror
                                        <input type="text" name="address" id="address" value="{{old('address', $suppliers->address)}}"
                                            value=""
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                            placeholder="Name" />
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="phone">Phone</label>
                                        @error('phone')
                                            <p class="text-red-800">{{ $message }}</p>
                                        @enderror
                                        <input type="text" name="phone" id="phone" value="{{old('phone',$suppliers->phone)}}"
                                            value=""
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                            placeholder="Name" />
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="email">Email</label>
                                        @error('email')
                                            <p class="text-red-800">{{ $message }}</p>
                                        @enderror
                                        <input type="email" name="email" id="email" value="{{old('email', $suppliers->email)}}"
                                            value=""
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                            placeholder="Name" />
                                    </div>
                                    <div class="md:col-span-5 text-right">
                                        <div class="flex items-center justify-between">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
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
