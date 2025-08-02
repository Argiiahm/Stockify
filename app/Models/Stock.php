<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    protected static function booted()
    { 
        static::saved(function ($Stock) {
            if (!auth()->check()) return;

            $productName = $Stock->product->name;

            if ($Stock->status === 'diterima') {
                UserActivity::create([
                    'user_id' => auth()->id(),
                    'action' => 'menambahkan',
                    'activity' => 'menambahkan Stock: ' . $productName
                ]);
            } elseif ($Stock->status === 'dikeluarkan') { 
                UserActivity::create([
                    'user_id' => auth()->id(),
                    'action' => 'dikeluarkan',
                    'activity' => 'barang keluar: ' . $productName
                ]);
            }
        });
    }
}