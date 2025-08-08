<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stokify</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body>
    <div class="max-w-screen-lg mx-auto mt-40 p-6 bg-gray-100 flex items-center justify-center">
        <div class="container m ax-w-screen-lg mx-auto">
            <div>
                <h2 class="font-semibold text-xl text-gray-600">Edit</h2>
                <p class="text-gray-500 mb-6">Welcome Stockify</p>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Edit Data</p>
                            <p>Ayo berpetualang!</p>
                        </div>

                        <div class="lg:col-span-2">
                            <form action="/attribute/update/{{ $attribute->id }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">

                                    <div class="md:col-span-5">
                                        <label for="name">Name</label>
                                        @error('name')
                                            <p class="text-red-800">{{ $message }}</p>
                                        @enderror
                                        <input type="text" name="name" id="name" value="{{ old('name', $attribute->name) }}"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" 
                                            placeholder="" />
                                    </div>
                                    <div class="md:col-span-5 ">
                                        <div class="md:col-span-5">
                                            <label for="product_id">Produk Name</label>
                                            @error('product_id')
                                               <p class="text-red-800">{{ $message }}</p>
                                            @enderror
                                            <input type="product_id" name="product_id" id="product_id" value="{{ old('product_id', $attribute->product->name) }}"
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" disabled>
                                        </div>
                                        <div class="md:col-span-5 ">
                                        <div class="md:col-span-5">
                                            <label for="value">Values</label>
                                            @error('value')
                                               <p class="text-red-800">{{ $message }}</p>
                                            @enderror
                                            <input type="value" name="value" id="value" value="{{ old('value', $attribute->value) }}"
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                        </div>
                                        <div class="flex items-center justify-between mt-4 ">
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Masuk</button>
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
