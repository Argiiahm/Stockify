<?php

namespace App\Exports;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Product::with(['categories', 'suppliers'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Slug',
            'Nama Produk',
            'SKU',
            'Deskripsi',
            'Harga Beli',
            'Harga Jual',
            'Stok Minimum',
            'Kategori',
            'Supplier',
            'Gambar',
        ];
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->slug,
            $product->name,
            $product->sku,
            $product->description,
            $product->purchase_price,
            $product->selling_price,
            $product->minimum_stock,
            $product->categories->name,
            $product->suppliers->name,
            $product->image
        ];
    }
}
