<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    public function suppliers()
    {
        return $this->belongsTo(Suppliers::class, 'supplier_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class, 'product_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }


    protected static function booted()
    {
        static::created(function ($product) {
            if (Auth::check()) {
                UserActivity::create([
                    'user_id' => auth()->user()->id,
                    'action' => 'create',
                    'activity' => 'Membuat Produk: ' . $product->name
                ]);
            }
        });

        static::updated(function ($product) {
              UserActivity::create([
                'user_id' => auth()->user()->id,
                'action' => 'Update',
                'activity' => 'Mengubah Produk: ' . $product->name
            ]);
        });

        static::deleted(function ($product) {
            UserActivity::create([
                'user_id' => auth()->user()->id,
                'action' => 'create',
                'activity' => 'Menghapus Produk: ' . $product->name
            ]);
        });
    }
}
