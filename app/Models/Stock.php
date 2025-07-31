<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }



         protected static function booted()
    {
        static::created(function ($Stock) {
            UserActivity::create([
                'user_id' => auth()->user()->id,
                'action' => 'menambahkan',
                'activity' => 'menambahkan Stock: ' . $Stock->product->name
            ]);
        });

        // static::updated(function ($Stock) {
        //     UserActivity::create([
        //         'user_id' => auth()->user()->id,
        //         'action' => 'update',
        //         'activity' => 'Mengubah Stock: ' . $Stock->name
        //     ]);
        // });

        static::deleted(function ($Stock) {
            UserActivity::create([
                'user_id' => auth()->user()->id,
                'action' => 'dikeluarkan',
                'activity' => ' barang keluar: ' . $Stock->product->name
            ]);
        });
    }

}
