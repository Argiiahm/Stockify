<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Suppliers;
use App\Models\Categories;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
     * @param array
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        $category = Categories::where('name', $row['kategori'])->first();
        $supplier = Suppliers::where('name', $row['supplier'])->first();

        return new Product([
            'name'            => $row['nama_produk'],
            'slug'            => Str::slug($row['nama_produk']),
            'sku'             => $row['sku'],
            'description'     => $row['deskripsi'],
            'purchase_price'  => $row['harga_beli'],
            'selling_price'   => $row['harga_jual'],
            'minimum_stock'   => $row['stok_minimum'],
            'category_id'     => $category ? $category->id : null,
            'supplier_id'     => $supplier ? $supplier->id : null,
            'image'           => $row['gambar'],
        ]);
    }
}
