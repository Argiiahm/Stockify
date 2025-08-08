<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stokify - Edit Produk</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <div class="max-w-3xl mx-auto mt-10 p-8 bg-white dark:bg-gray-800 rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Edit Produk</h1>

        <form action="/update/product/{{ $Data->id }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
           @method('PUT')
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nama Produk</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $Data->name) }}"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nama produk" required>
            </div>

            <div>
                <label for="suppliers" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Supplier</label>
                <select id="suppliers" name="supplier_id"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($Suppliers as $s)
                        <option value="{{ $s->id }}" {{ old('supplier_id', $Data->supplier_id) == $s->id ? 'selected' : '' }}>
                            {{ $s->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                <select id="category_id" name="category_id"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($Categories as $c)
                        <option value="{{ $c->id }}" {{ old('category_id', $Data->category_id) == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="sku" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">SKU</label>
                <input type="text" name="sku" id="sku"
                    value="{{ old('sku', $Data->sku) }}"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan SKU" required>
            </div>

            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan deskripsi produk" required>{{ old('description', $Data->description) }}</textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="purchase_price" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Harga Beli</label>
                    <input type="number" name="purchase_price" id="purchase_price"
                        value="{{ old('purchase_price', $Data->purchase_price) }}"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Harga beli" required>
                </div>
                <div>
                    <label for="selling_price" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Harga Jual</label>
                    <input type="number" name="selling_price" id="selling_price"
                        value="{{ old('selling_price', $Data->selling_price) }}"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Harga jual" required>
                </div>
            </div>

            <div>
                <label for="image" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Gambar Produk</label>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('storage/' . $Data->image) }}" alt="Preview" class="w-20 h-20 rounded-lg object-cover border">
                    <input type="file" name="image" id="image"
                        class="w-full text-sm text-gray-900 dark:text-gray-300 file:mr-4 file:py-2 file:px-4
                               file:rounded-lg file:border-0 file:text-sm file:font-semibold
                               file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
            </div>

            <div>
                <label for="minimum_stock" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Stok Minimum</label>
                <input type="number" name="minimum_stock" id="minimum_stock"
                    value="{{ old('minimum_stock', $Data->minimum_stock) }}"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Minimal stok" required>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
