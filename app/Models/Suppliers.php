<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $guarded = [];

    public function products() {
        return $this->hasMany(Product::class, 'supplier_id');
    }


         protected static function booted()
    {
        static::created(function ($Supplier) {
            UserActivity::create([
                'user_id' => auth()->user()->id,
                'action' => 'create',
                'activity' => 'Membuat Supplier: ' . $Supplier->name
            ]);
        });

        static::updated(function ($Supplier) {
            UserActivity::create([
                'user_id' => auth()->user()->id,
                'action' => 'update',
                'activity' => 'Mengubah Supplier: ' . $Supplier->name
            ]);
        });

        static::deleted(function ($Supplier) {
            UserActivity::create([
                'user_id' => auth()->user()->id,
                'action' => 'delete',
                'activity' => 'Menghapus Supplier: ' . $Supplier->name
            ]);
        });
    }

}
